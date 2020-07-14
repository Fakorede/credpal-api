import Vue from "vue";
import VueRouter from "vue-router";
import Welcome from "./pages/Welcome";
import Home from "./pages/Home";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "welcome",
            component: Welcome
        },
        {
            path: "/home",
            name: "home",
            component: Home
        }
    ]
});
