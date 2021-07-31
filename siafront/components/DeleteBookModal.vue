<template>
    <div>
        <b-modal id="deleteBookModal" title="Delete Book" ok-title="Delete Book" @ok="onDelete" ok-variant="danger">
            Are you sure in deleting this book? <br><br>
            Title: {{book.title}} <br>
            Price: {{book.price}}
        </b-modal>
    </div>
</template>

<script>
export default {
    props: {
        book: {}
    },
    methods: {
        async onDelete() {
            this.$axios.delete('/api/books/' + this.book.id)
            .then((res)=>{
                if(res.status==202) {
                    alert('Deleted successfully!')
                    this.$emit('onDeleted')
                }
            })
        }
    }
}
</script>