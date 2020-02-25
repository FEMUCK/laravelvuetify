<template>
  <v-app>
    <v-content>
      <v-container>
        <v-row align="center" justify="center">
          <v-col cols="12">
            <v-card class="mx-auto" max-width="auto" align="start">
              <v-toolbar color="primary" dark flat>
                <v-toolbar-title>Edit form</v-toolbar-title>
                <v-spacer />
              </v-toolbar>

              <v-card-text>
                <v-form ref="editform" v-model="valid" :lazy-validation="lazy">
                  <v-text-field v-model="name" :rules="nameRules" label="Product Name" required></v-text-field>

                  <v-text-field
                    type="number"
                    v-model="price"
                    :rules="priceRules"
                    label="Price"
                    required
                  ></v-text-field>
                  <v-text-field type="number" v-model="qty" :rules="qtyRules" label="QTY" required></v-text-field>
                </v-form>
              </v-card-text>

              <v-card-actions>
                <v-spacer />
                <v-btn
                  :disabled="!valid"
                  color="warning"
                  class="mr-4"
                  @click="updateProduct()"
                >Update</v-btn>

                <v-btn color="error" class="mr-4" @click="clear">Clear Form</v-btn>
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
  mounted() {
    this.getProductInfo();
  },
  data: function() {
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
    getProductInfo() {
      axios
        .get("/laravel-vuetify-master/public/api/edit/" + this.$route.params.id)
        .then(Response => {
          console.log(Response.data);
          this.name = Response.data.name;
          this.price = Response.data.price;
          this.qty = Response.data.qty;
        });
    },
    updateProduct() {
      if (this.$refs.editform.validate()) {
        // this.snackbar = true;
        axios
          .post(
            "/laravel-vuetify-master/public/api/update/" +
              this.$route.params.id,
            {
              name: this.name,
              price: this.price,
              qty: this.qty
            }
          )
          .then(Response => {
            //   console.log(Response.data);
            this.$router.push({ name: "crud" });
          });
      }
    },
    clear() {
      this.$refs.editform.reset();
    }
  }
};
</script>
