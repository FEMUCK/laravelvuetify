<template>
  <v-app>
    <v-content>
      <v-container>
        <v-row align="center" justify="center">
          <v-col cols="12">
            <v-card class="mx-auto" max-width="auto" align="start">
              <v-toolbar color="primary" dark flat>
                <v-toolbar-title>Create form</v-toolbar-title>
                <v-spacer />
              </v-toolbar>

              <v-card-text>
                <v-form ref="createform" v-model="valid" :lazy-validation="lazy">
                  <v-text-field
                    v-model="name"
                    :id="name"
                    :rules="nameRules"
                    label="Product Name"
                    required
                  ></v-text-field>

                  <v-text-field
                    type="number"
                    v-model="price"
                    :id="price"
                    :rules="priceRules"
                    label="Price"
                    required
                  ></v-text-field>

                  <v-text-field
                    type="number"
                    v-model="qty"
                    :id="qty"
                    :rules="qtyRules"
                    label="QTY"
                    required
                  ></v-text-field>
                </v-form>
              </v-card-text>

              <v-card-actions>
                <v-spacer />
                <v-btn :disabled="!valid" color="success" class="mr-4" @click="addProduct()">Create</v-btn>

                <v-btn color="error" class="mr-4" @click="clear">Clear Form</v-btn>

                <v-btn color="warning" @click="resetValidation">Reset Validation</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      valid: true,
      name: "",
      nameRules: [v => !!v || "Product Name is required"],
      price: "",
      priceRules: [
        v => !!v || "Price is required",
        v => v > 0 || "Price should be above 0"
      ],
      qty: "",
      qtyRules: [
        v => !!v || "QTY is required",
        v => v > 0 || "QTY should be above 0"
      ],
      lazy: false
    };
  },

  methods: {
    addProduct() {
      if (this.$refs.createform.validate()) {
        // this.snackbar = true;
        // axios.post("/api/addproduct", {
        axios
          // .post("/api/addproduct", {
          .post("laravel-vuetify-master/public/api/addproduct", {
            name: this.name,
            price: this.price,
            qty: this.qty
            // });
          })
          .then(Response => {
            // console.log(Response.data);
            // คล้าย session ใน laravel
            // localStorage.myemail = Response.data[0].email;

            // คือการ refresh หน้า
            // window.location.href = "/crud";

            // Navigating to the named route SOURCE : https://michaelnthiessen.com/redirect-in-vue
            this.$router.push({ name: "crud" });
          });
      }
    },
    clear() {
      this.$refs.createform.reset();
    },
    resetValidation() {
      this.$refs.createform.resetValidation();
    }
  }
};
</script>
