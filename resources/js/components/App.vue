<template>
    <div class="flex flex-col flex-1 h-screen overflow-y-hidden">
        <Nav />
        <!-- flex overflow-y-hidden flex-1 -->
        <div class="overflow-x-hidden w-full">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import Nav from "./Nav";
export default {
    name: "App",
    components: {
        Nav
    }
};
</script>
