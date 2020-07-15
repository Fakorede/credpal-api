const state = {
    books: null,
    booksStatus: null, //loading state
    bookIsbn: "",
    bookTitle: "",
    bookDescription: "",
    bookAuthor: ""
};

const actions = {
    fetchBooks({ commit, state }) {
        commit("setBooksStatus", "loading");

        axios
            .get("/api/books")
            .then(res => {
                commit("setBooks", res.data);
                commit("setBooksStatus", "success");
            })
            .catch(err => {
                commit("setBooksStatus", "error");
            });
    },
    addBook({ commit, state }) {
        commit("setBooksStatus", "loading");

        axios
            .post("/api/books", {
                isbn: state.bookIsbn,
                title: state.bookTitle,
                description: state.bookDescription,
                title: state.bookTitle
            })
            .then(res => {
                commit("addBook", res.data);
                commit("updateIsbn", "");
                commit("updateTitle", "");
                commit("updateDescription", "");
                commit("updateAuthor", "");
            })
            .catch(err => {});
    }
};

const getters = {
    books: state => {
        return state.books;
    },
    booksStatus: state => {
        return state.booksStatus;
    },
    bookIsbn: state => {
        return state.bookIsbn;
    },
    bookTitle: state => {
        return state.bookTitle;
    },
    bookDescription: state => {
        return state.bookDescription;
    },
    bookAuthor: state => {
        return state.bookAuthor;
    }
};

const mutations = {
    setBooks(state, books) {
        state.books = books;
    },
    setBooksStatus(state, status) {
        state.booksStatus = status;
    },
    updateIsbn(state, isbn) {
        state.bookIsbn = isbn;
    },
    updateTitle(state, title) {
        state.bookTitle = title;
    },
    updateDescription(state, description) {
        state.bookDescription = description;
    },
    updateAuthor(state, author) {
        state.bookAuthor = author;
    },
    addBook(state, book) {
        state.books.data.unshift(book);
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
