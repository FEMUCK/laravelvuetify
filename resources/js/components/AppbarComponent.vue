<template>
  <div>
    <!-- <v-app-bar color="deep-purple accent-4" dense dark> -->
    <v-app-bar
      elevate-on-scroll
      style=" background: #3A1C71; background: -webkit-linear-gradient(to right, #29B6F6, #4FC3F7, #00BCD4); background: linear-gradient(to right, #29B6F6, #4FC3F7, #00BCD4); "
    >
      <v-app-bar-nav-icon @click="drawer = true" class="white--text"></v-app-bar-nav-icon>

      <v-toolbar-title class="white--text">Laravel Vuetify</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon class="white--text">mdi-heart</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon class="white--text">mdi-magnify</v-icon>
      </v-btn>

      <!-- <v-menu left bottom>
        <template v-slot:activator="{ on }">
          <v-btn icon v-on="on">
            <v-icon class="white--text">mdi-dots-vertical</v-icon>
          </v-btn>
        </template>

        <v-list>
          <v-list-item v-for="n in 5" :key="n" @click="() => {}">
            <v-list-item-title>Option {{ n }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>-->
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" absolute temporary>
      <v-list nav dense>
        <v-list-item-group v-model="group" active-class="cyan--text text--accent-4">
          <v-list-item to="/example">
            <v-list-item-icon>
              <v-icon>mdi-home</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item>

          <v-list-item to="/login">
            <v-list-item-icon>
              <v-icon>mdi-account</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Account</v-list-item-title>
          </v-list-item>

          <v-list-item to="/create">
            <v-list-item-icon>
              <v-icon>mdi-database-plus</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Create</v-list-item-title>
          </v-list-item>

          <v-list-item to="/crud">
            <v-list-item-icon>
              <v-icon>mdi-database-edit</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Table</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
export default {
  data: () => ({
    drawer: false
  })
};
</script>
