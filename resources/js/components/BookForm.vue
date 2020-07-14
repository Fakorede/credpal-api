<template>
    <div class="flex items-center justify-center h-full">
        <div class="flex max-w-5xl">
            <div class="bg-white w-full p-8">
                <h1 class="text-gray-700 text-3xl text-center mb-4">
                    Add New Book
                </h1>
                <form action="#" method="post" class="text-gray-600">
                    <div class="my-5">
                        <input
                            type="text"
                            placeholder="Book ISBN"
                            name="isbn"
                            autofocus
                            class="border-rounded w-full py-2 px-4 outline-none focus:shadow-outline"
                        />
                    </div>
                    <div class="my-5">
                        <input
                            type="text"
                            placeholder="Book Title"
                            name="title"
                            class="border-rounded w-full py-2 px-4 outline-none focus:shadow-outline"
                        />
                    </div>
                    <div class="my-5">
                        <textarea name="description" id="" placeholder="Add Book Details" class="border-rounded w-full py-2 px-4 outline-none focus:shadow-outline"></textarea>
                    </div>
                    <div class="my-3">
                        <button
                            class="border-rounded border-blue-700 bg-blue-600 text-white w-full py-2"
                            type="submit"
                        >
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BookForm"
};
</script>
