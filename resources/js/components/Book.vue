<template>
    <div class="bg-white rounded shadow w-full mt-1 overflow-hidden">
        <div class="flex flex-col p-4">
            <div class="ml-6">
                <div class="font-bold">Book Title</div>
                <div class="text-sm text-gray-600">isbn</div>
            </div>
            <div class="mt-4">
                Book description
            </div>
        </div>

        <div class="flex justify-between border-1 border-gray-400 m-4">
            <div>Written by: <span class="font-bold">Book Author</span></div>
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
    name: "Book"
};
</script>
