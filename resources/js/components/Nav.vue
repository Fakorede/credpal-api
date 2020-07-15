<template>
    <div
        class="bg-white h-15 px-4 flex items-center border-b border-gray-400 shadow"
    >
        <div class="w-2/3 h-full flex justify-center items-center">
            <div class="ml-2 mr-20">
                <input
                    type="text"
                    name="search"
                    class="rounded-full pl-8 w-60 bg-gray-200 h-10 focus:outline-none focus:shadow-outline"
                    placeholder="Search books..."
                />
            </div>
            <router-link
                to="/"
                class="px-6 h-full border-b-2 border-blue-500 flex items-center"
                >Home</router-link
            >
            <router-link to="/" class="px-6 h-full flex items-center"
                >New Post</router-link
            >
        </div>
        <div class="w-1/3 flex justify-end">
            <router-link to="/" class="px-6 h-full flex items-center"
                >Logout</router-link
            >
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    name: "Nav",
    computed: {
        ...mapGetters({
            authUser: "authUser"
        })
    }
    // data: () => {
    //     return {
    //         user: null
    //     };
    // },
    // mounted() {
    //     axios
    //         .get("/api/auth-user")
    //         .then(res => {
    //             this.user = res.data;
    //         })
    //         .catch(err => {
    //             console.log("Unable to fetch authenticated user.");
    //         });
    // }
};
</script>

<style></style>
