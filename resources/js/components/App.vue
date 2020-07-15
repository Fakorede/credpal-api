<template>
    <div class="flex flex-col flex-1 h-screen overflow-y-hidden">
        <Nav />
        <div class="overflow-x-hidden w-full">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import Nav from "./Nav";
export default {
    name: "App",
    mounted() {
        this.$store.dispatch("fetchAuthUser");
    },
    watch: {
        $route(to, from) {
            this.$store.dispatch("setPageTitle", to.meta.title);
        }
    },
    components: {
        Nav
    }
};
</script>
