<template>
    <div class="bg-white rounded shadow w-full mt-1 overflow-hidden">
        <div class="flex flex-col p-4">
            <div class="ml-6">
                <div class="text-2xl">
                    Book Title:
                    <span class="font-bold">{{
                        book.data.attributes.title
                    }}</span>
                </div>
                <div>
                    Isbn:
                    <span class="text-sm text-gray-600">
                        {{ book.data.attributes.isbn }}
                    </span>
                </div>
            </div>
            <div class="mt-4 ml-6">
                <span class="text-2xl">Description: </span><br />
                {{ book.data.attributes.description }}
            </div>
        </div>

        <div class="flex justify-between border-1 border-gray-400 m-4">
            <div class="ml-6">
                Written by: <span class="font-bold">Book Author</span>
            </div>
            <div>
                <div>
                    <p>Average ratings: ⭐⭐⭐</p>
                </div>
            </div>
            <button type="submit">Submit Review</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "Book",
    props: ["book"]
};
</script>
