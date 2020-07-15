import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./pages/Home";
import Books from "./pages/Books";
import AddBook from "./pages/AddBook";
import Login from "./pages/Login";
import { longStackSupport } from "q";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "books",
            component: Books,
            meta: { title: "Books Page" }
        },
        {
            path: "/books/add",
            name: "addBooks",
            component: AddBook,
            meta: { title: "Add New Book" }
        },
        {
            path: "/home",
            name: "home",
            component: Home,
            meta: { title: "Home Page" }
        },
        {
            path: "/signin",
            name: "login",
            component: Login,
            meta: { title: "Login Page" }
        },
        {
            path: "/signout",
            name: "logout"
        }
    ]
});
