<template>
    <div class="flex flex-col items-center py-4">
        <BookForm />
    </div>
</template>

<script>
import BookForm from "../components/BookForm";
export default {
    name: "AddBook",
    components: {
        BookForm
    }
};
</script>
