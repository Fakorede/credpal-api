<template>
    <div class="flex flex-col items-center ml-10 py-4">
        <h1 class="text-gray-700 text-3xl mb-4">All Books</h1>
        <Book />
    </div>
</template>

<script>
import Book from "../components/Book";
export default {
    name: "Books",
    components: {
        Book
    }
};
</script>
