<template>
    <div class="flex flex-col items-center ml-10 py-4">
        <h1 class="text-gray-700 text-3xl mb-4">All Books</h1>
        <p v-if="loading">Loading Books...</p>
        <Book
            v-else
            v-for="book in books.data"
            :key="book.data.book_id"
            :book="book"
        />
    </div>
</template>

<script>
import Book from "../components/Book";
export default {
    name: "Books",
    data: () => {
        return {
            books: null,
            loading: true
        };
    },
    mounted() {
        axios
            .get("/api/books")
            .then(res => {
                this.books = res.data;
                this.loading = false;
            })
            .catch(err => {
                console.log("Unable to fetch books at this time.");
                this.loading = false;
            });
    },
    components: {
        Book
    }
};
</script>
