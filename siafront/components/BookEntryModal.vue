<template>
    <div>
        <b-button v-b-modal.BookEntryModal variant="primary">Add Book</b-button>

        <b-modal id="BookEntryModal" title="Book Entry" ok-title="Save Book" @ok="onSubmit">
            <form action="#">
                <b-form-group label="Title" label-for="title">
                <b-form-input id="title" v-model="book.title" trim></b-form-input>
                </b-form-group>

                <b-form-group label="Price" label-for="price">
                <b-form-input id="price" v-model="book.price" trim></b-form-input>
                </b-form-group>
                

                <b-form-group label="Author" label-for="author">
                <b-form-input id="author" v-model="book.author" trim></b-form-input>
                </b-form-group>


                <b-form-group label="Publisher" label-for="publisher">
                <b-form-input id="publisher" v-model="book.publisher" trim></b-form-input>
                </b-form-group>

                <b-form-group label="Details" label-for="details">
                <b-form-select v-model="book.details" :options="options"></b-form-select>
                </b-form-group>
            </form>
        </b-modal>
    </div>
</template>

<script>
export default {
    data() {
        return {
            book: {},
            options: [
                {value: 'fiction', text: 'fiction'},
                {value: 'non-fiction', text: 'non-fiction'},
            ]
        }
    },
    methods: {
        async onSubmit() {
            this.$axios.post('/api/books', this.book)
            .then((res)=>{
                if(res.status==202) {
                    alert('Successfully added an book')
                    this.$emit('onAdd')
                }
            })
        }
    }
}
</script>