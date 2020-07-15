<template>
    <div class="flex flex-col items-center ml-10 py-4">
        <h1 class="text-gray-700 text-3xl mb-4">All Books</h1>
        <p v-if="booksStatus === 'loading'">Loading Books...</p>
        <Book
            v-else
            v-for="book in books.data"
            :key="book.data.book_id"
            :book="book"
        />
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import Book from "../components/Book";
export default {
    name: "Books",
    mounted() {
        this.$store.dispatch("fetchBooks");
    },
    computed: {
        ...mapGetters({
            books: "books",
            booksStatus: "booksStatus"
        })
    },
    components: {
        Book
    }
};
</script>
