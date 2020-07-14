<template>
    <div class="flex items-center justify-center h-full">
        <div class="flex max-w-3xl">
            <div class="bg-white w-full p-8">
                <h1 class="text-gray-700 text-3xl text-center mb-4">SIGN IN</h1>
                <form action="#" method="post" class="text-gray-600">
                    <div class="my-3">
                        <input
                            type="email"
                            placeholder="Enter your e-mail address"
                            name="email"
                            autofocus
                            class="border-rounded w-full py-2 px-4 outline-none focus:shadow-outline"
                        />
                    </div>
                    <div class="my-3">
                        <input
                            type="password"
                            placeholder="Enter your password"
                            class="border-rounded w-full py-2 px-4 outline-none focus:shadow-outline"
                        />
                    </div>
                    <div class="my-3">
                        <label><input type="checkbox" /> Remember me</label>
                    </div>
                    <div class="my-3">
                        <button
                            class="border-rounded border-blue-700 bg-blue-600 text-white w-full py-2"
                            type="submit"
                        >
                            Sign In
                        </button>
                    </div>

                    <a href="#" class="text-blue-500">Forgot your password?</a>
                </form>
            </div>
        </div>
    </div>
</template>
