/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import "./bootstrap";

import Vue from "vue";
import vuetify from "./plugins/vuetify";
import App from "./App.vue";

import Vuelidate from "vuelidate";
import VueRouter from "vue-router";
Vue.use(Vuelidate);
Vue.use(VueRouter);

Vue.component(
  "example-component",
  require("./components/ExampleComponent.vue").default
);

Vue.component(
  "create-component",
  require("./components/CreateComponent.vue").default
);

Vue.component(
  "edit-component",
  require("./components/EditComponent.vue").default
);

Vue.component(
  "table-component",
  require("./components/TableComponent.vue").default
);

Vue.component(
  "register-component",
  require("./components/RegisterComponent.vue").default
);

Vue.component(
  "login-component",
  require("./components/LoginComponent.vue").default
);

Vue.component(
  "appbar-component",
  require("./components/AppbarComponent.vue").default
);

Vue.component(
  "footer-component",
  require("./components/FooterComponent.vue").default
);

// Vue.component("navbar-component", require("./components/Navbar.vue").default);
// Vue.component("product-component", require("./components/Product.vue").default);

const routes = [
  {
    path: "/example",
    name: "example",
    component: require("./components/ExampleComponent.vue").default
  },
  {
    path: "/login",
    name: "login",
    component: require("./components/LoginComponent.vue").default
  },
  {
    path: "/register",
    name: "register",
    component: require("./components/RegisterComponent.vue").default
  },
  {
    path: "/create",
    name: "create",
    component: require("./components/CreateComponent.vue").default
  },
  {
    path: "/edit/:id",
    name: "edit",
    component: require("./components/EditComponent.vue").default
  },
  {
    path: "/crud",
    name: "crud",
    component: require("./components/TableComponent.vue").default
  }
  // { path: "/product", component: require("./components/Product.vue").default }
  // { path: "/bar", component: Bar }
];

const router = new VueRouter({
  mode: "history", // to remove # from url ไว้ใช้ตอน production only
  routes // short for `routes: routes`
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  vuetify,
  router,
  el: "#app",
  render: h => h(App)
});
