<template>
  <v-footer
    padless
    absolute
    style=" background: #3A1C71; background: -webkit-linear-gradient(to right, #4fc3f7, #81d4fa, #80deea); background: linear-gradient(to right, #4fc3f7, #81d4fa, #80deea); "
  >
    <v-row justify="center" no-gutters>
      <v-btn v-for="link in links" :key="link" color="white" text rounded class="my-2">{{ link }}</v-btn>
      <v-col
        class="py-4 text-center white--text"
        cols="12"
        style=" background: #3A1C71; background: -webkit-linear-gradient(to right, #29B6F6, #4FC3F7, #00BCD4); background: linear-gradient(to right, #29B6F6, #4FC3F7, #00BCD4); "
      >
        {{ new Date().getFullYear() }} —
        <strong>Laravel Vuetify</strong>
      </v-col>
    </v-row>
  </v-footer>
</template>

<script>
export default {
  data: () => ({
    links: ["Home", "About Us", "Team", "Services", "Blog", "Contact Us"]
  })
};
</script>
