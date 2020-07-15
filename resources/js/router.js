import Vue from "vue";
import VueRouter from "vue-router";
import Welcome from "./pages/Welcome";
import Home from "./pages/Home";
import Books from "./pages/Books";
import AddBook from "./pages/AddBook";
import Login from "./pages/Login";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "books",
            component: Books
        },
        {
            path: "/books/add",
            name: "addBooks",
            component: AddBook
        },
        {
            path: "/home",
            name: "home",
            component: Home
        },
        {
            path: "/signin",
            name: "login",
            component: Login
        }
    ]
});
