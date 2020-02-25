<template>
  <v-app>
    <v-content>
      <appbar-component></appbar-component>
      <router-view></router-view>
      <footer-component></footer-component>
    </v-content>
  </v-app>
</template>

<script>
export default {};
</script>

<style lang="sass">
.sass
  background: map-get($material-light, 'cards')
</style>

<style lang="scss">
.scss {
  background: map-get($material-light, "cards");
}
</style>
