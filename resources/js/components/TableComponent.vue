<template>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product Name</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Action</th>
          <!-- <th scope="col">แก้ไข</th>
          <th scope="col">ลบ</th>-->
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in Items" :key="item.id">
          <td>{{ item.id }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.price }}</td>
          <td>{{ item.qty }}</td>
          <!-- <td>
            <router-link :to="'/edit/' + item.id" class="btn btn-warning">แก้ไข</router-link>
          </td>
          <td>
            <button @click="Delete(item.id)" class="btn btn-danger">ลบ</button>
          </td>-->
          <td>
            <v-icon small class="mr-2" @click="editItem(item.id)">mdi-border-color</v-icon>
            <v-icon small @click="deleteItem(item.id)">mdi-delete</v-icon>
          </td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
export default {
  data() {
    return {
      json_fields: {
        name: "name",
        price: "price",
        qty: "qty"
      },
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
      axios
        .get("laravel-vuetify-master/public/api/getproduct")
        .then(Response => {
          console.log(Response.data);
          this.Items = Response.data;
        });
    },
    deleteItem(id) {
      confirm("Are you sure you want to delete this item?") &&
        axios
          .get("laravel-vuetify-master/public/api/deleteproduct/" + id)
          .then(Response => {
            console.log(Response.data);
            // this.Items = Response.data;

            // เพื่อให้ลบแล้วข้อมูลหาย แต่ไม่ refresh หน้า ถ้าเป็นใน laravel ก็คือ return redirect->back
            this.getData();
          });
    },
    editItem(id) {
      this.$router.push({ name: "edit", params: { id } });
    }
  }
};
</script>
