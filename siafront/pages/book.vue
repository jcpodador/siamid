<template>
    <div>
        <NavBar />
        <EditBookModal :book="selectedBook" />
        <DeleteBookModal :book="selectedBook" @onDeleted="getAll" />

        <div class="container">
            <h1>
                List of Books
            </h1>
            
            <BookEntryModal class="float-right mb-1" @onAdd="getAll" />

            <table class="table table-bordered table-striped table-primary">
                <thead>
                    <tr class="bg-info text-white">
                        <th>Title</th>
                        <th>Price</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Details</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="book in books" :key="book.id">
                        <td>{{book.name}}</td>
                        <td>{{book.age}}</td>
                        <td>{{book.expertise}}</td>
                        <td>{{book.address}}</td>
                        <td>{{book.contact}}</td>
                        <td class="buttons">
                            <b-button @click="onEdit(book)" variant="primary" size="sm">
                                Edit
                            </b-button>
                            <b-button @click="onDelete(book)" variant="danger" size="sm">
                                Delete
                            </b-button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
           books: [],
            selectedBook: {}
        }
    },
    methods: {
        async getAll() {
            await this.$axios.get('/api/books')
            .then((res)=>{
                if (res.status==200) {
                    this.books = res.data
                };
            })
        },
        onEdit(selectedBook) {
            this.selectedBook = selectedBook
            this.$bvModal.show('editBookModal')
        },
        onDelete(selectedBook) {
            this.selectedBook = selectedBook
            this.$bvModal.show('deleteBookModal')
        }
    },
    created() {
        this.getAll()
    }
}
</script>

<style>
h1 {
    text-align: center;
    margin-top: 50px;
}
.buttons {
    text-align: center;
}
</style>