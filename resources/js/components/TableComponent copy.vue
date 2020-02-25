<template>
  <v-data-table :headers="headers" :items="Items" class="elevation-1" :search="search">
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title>
          My CRUD
          <v-spacer></v-spacer>
          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Search"
            single-line
            hide-details
          ></v-text-field>
        </v-toolbar-title>

        <v-divider class="mx-4" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="500px">
          <template v-slot:activator>
            <v-btn to="/create" color="primary" dark class="mb-2">New Item</v-btn>
          </template>
          <!-- <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.name" label="Product name"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.calories" label="Calories"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.fat" label="Fat (g)"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.carbs" label="Carbs (g)"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.protein" label="Protein (g)"></v-text-field>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="save">Save</v-btn>
            </v-card-actions>
          </v-card>-->
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:item.action="{ item }">
      <!-- <v-icon small class="mr-2" @click="editItem(item)">mdi-border-color</v-icon>
      <v-icon small @click="deleteItem(item)">mdi-delete</v-icon>-->
      <v-icon small class="mr-2" @click="editItem(item)">mdi-border-color</v-icon>
      <v-icon small @click="Delete(myid)">mdi-delete</v-icon>
    </template>
    <!-- <template v-slot:no-data>
      <v-btn color="primary" @click="initialize">Reset</v-btn>
    </template>-->
  </v-data-table>
</template>

<script>
export default {
  data: function() {
    return {
      search: "",
      headers: [
        { text: "ID" },
        {
          text: "Product name",
          align: "left",
          sortable: false,
          value: "name"
        },
        { text: "Price", value: "price" },
        { text: "QTY", value: "qty" },
        { text: "Actions", value: "action", sortable: false }
      ],
      // json_fields: {
      //   name: "name",
      //   price: "price",
      //   qty: "qty"
      // },
      Items: [],
      value: null
    };
  },
  // รัน fn getdata อัตโนมัติก่อน render หน้า
  mounted() {
    this.getData();
  },
  methods: {
    getData() {
      // axios.get("/api/getproduct ").then(Response => {
      axios
        .get("laravel-vuetify-master/public/api/getproduct ")
        .then(Response => {
          console.log(Response.data);
          this.Items = Response.data;
        });
    },
    Delete(id) {
      confirm("Are you sure you want to delete this item?") &&
        // axios.delete("/api/deleteproduct/" + id).then(Response => {
        axios
          .delete("laravel-vuetify-master/public/api/deleteproduct/" + id)
          .then(Response => {
            console.log(Response.data);
            // this.Items = Response.data;

            // เพื่อให้ลบแล้วข้อมูลหาย แต่ไม่ refresh หน้า ถ้าเป็นใน laravel ก็คือ return redirect->back
            this.getData();
          });
    }
  }
  // data: function() {
  //   return {
  //     search: "",
  //     headers: [
  //       {
  //         text: "Product name",
  //         align: "left",
  //         sortable: false,
  //         value: "name"
  //       },
  //       { text: "Price", value: "price" },
  //       { text: "QTY", value: "qty" },
  //       { text: "Actions", value: "action", sortable: false }
  //     ],
  //     dialog: false,
  //     desserts: [],
  //     editedIndex: -1,
  //     editedItem: {
  //       name: "",
  //       calories: 0,
  //       fat: 0,
  //       carbs: 0,
  //       protein: 0
  //     },
  //     defaultItem: {
  //       name: "",
  //       calories: 0,
  //       fat: 0,
  //       carbs: 0,
  //       protein: 0
  //     }
  //   };
  // },
  // computed: {
  //   formTitle() {
  //     return this.editedIndex === -1 ? "New Item" : "Edit Item";
  //   }
  // },
  // watch: {
  //   dialog(val) {
  //     val || this.close();
  //   }
  // },

  // created() {
  //   this.initialize();
  // },

  // methods: {
  //   initialize() {
  //     this.desserts = [
  //       {
  //         name: "Frozen Yogurt",
  //         calories: 159,
  //         fat: 6.0,
  //         carbs: 24,
  //         protein: 4.0
  //       },
  //       {
  //         name: "Ice cream sandwich",
  //         calories: 237,
  //         fat: 9.0,
  //         carbs: 37,
  //         protein: 4.3
  //       },
  //       {
  //         name: "Eclair",
  //         calories: 262,
  //         fat: 16.0,
  //         carbs: 23,
  //         protein: 6.0
  //       },
  //       {
  //         name: "Cupcake",
  //         calories: 305,
  //         fat: 3.7,
  //         carbs: 67,
  //         protein: 4.3
  //       },
  //       {
  //         name: "Gingerbread",
  //         calories: 356,
  //         fat: 16.0,
  //         carbs: 49,
  //         protein: 3.9
  //       },
  //       {
  //         name: "Jelly bean",
  //         calories: 375,
  //         fat: 0.0,
  //         carbs: 94,
  //         protein: 0.0
  //       },
  //       {
  //         name: "Lollipop",
  //         calories: 392,
  //         fat: 0.2,
  //         carbs: 98,
  //         protein: 0
  //       },
  //       {
  //         name: "Honeycomb",
  //         calories: 408,
  //         fat: 3.2,
  //         carbs: 87,
  //         protein: 6.5
  //       },
  //       {
  //         name: "Donut",
  //         calories: 452,
  //         fat: 25.0,
  //         carbs: 51,
  //         protein: 4.9
  //       },
  //       {
  //         name: "KitKat",
  //         calories: 518,
  //         fat: 26.0,
  //         carbs: 65,
  //         protein: 7
  //       }
  //     ];
  //   },

  //   editItem(item) {
  //     this.editedIndex = this.desserts.indexOf(item);
  //     this.editedItem = Object.assign({}, item);
  //     this.dialog = true;
  //   },

  //   deleteItem(item) {
  //     const index = this.desserts.indexOf(item);
  //     confirm("Are you sure you want to delete this item?") &&
  //       this.desserts.splice(index, 1);
  //   },

  //   close() {
  //     this.dialog = false;
  //     setTimeout(() => {
  //       this.editedItem = Object.assign({}, this.defaultItem);
  //       this.editedIndex = -1;
  //     }, 300);
  //   },

  //   save() {
  //     if (this.editedIndex > -1) {
  //       Object.assign(this.desserts[this.editedIndex], this.editedItem);
  //     } else {
  //       this.desserts.push(this.editedItem);
  //     }
  //     this.close();
  //   }
  // }
};
</script>
