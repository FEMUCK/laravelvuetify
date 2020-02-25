<template>
  <v-app id="inspire">
    <v-content>
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="4">
            <v-card class="elevation-12">
              <v-toolbar color="primary" dark flat>
                <v-toolbar-title>Laravel + Vuetify Login form</v-toolbar-title>
                <v-spacer />

                <!-- <v-tooltip bottom>
                  <template v-slot:activator="{ on }">
                    <v-btn :href="source" icon large target="_blank" v-on="on">
                      <v-icon>mdi-code-tags</v-icon>
                    </v-btn>
                  </template>
                  <span>Source</span>
                </v-tooltip>
                <v-tooltip right>
                  <template v-slot:activator="{ on }">
                    <v-btn icon large href="https://codepen.io/johnjleider/pen/pMvGQO" target="_blank" v-on="on" >
                      <v-icon>mdi-codepen</v-icon>
                    </v-btn>
                  </template>
                  <span>Codepen</span>
                </v-tooltip>-->
              </v-toolbar>

              <v-card-text>
                <v-form ref="loginform" v-model="valid">
                  <v-text-field
                    clearable
                    label="Username"
                    name="username"
                    id="username"
                    prepend-icon="mdi-account"
                    type="text"
                    v-model="username"
                    required
                    :rules="usernameRules"
                  />
                  <v-text-field
                    clearable
                    label="Password"
                    name="password"
                    id="password"
                    prepend-icon="mdi-lock"
                    :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                    :type="show1 ? 'text' : 'password'"
                    @click:append="show1 = !show1"
                    v-model="password"
                    required
                    :rules="passwordRules"
                  />
                </v-form>
              </v-card-text>

              <v-card-actions>
                <v-spacer />
                <v-btn color="primary" to="/register">Register</v-btn>
                <v-btn color="success" :disabled="!valid" @click="validate">Login</v-btn>
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
  // data () {
  //     return {
  //       show1: false,
  //       password: '',
  //       }
  //   },
  data: function() {
    return {
      show1: false,
      valid: true,
      username: "",
      usernameRules: [v => !!v || "Username is required"],
      password: "",
      passwordRules: [v => !!v || "Password is required"]
    };
  },
  methods: {
    validate() {
      if (this.$refs.loginform.validate()) {
        // this.snackbar = true,
        axios
          .post("laravel-vuetify-master/public/api/login", {
            username: this.username,
            password: this.password
            // });
          })
          .then(Response => {
            // console.log(Response.data);
            // คล้าย session ใน laravel
            // localStorage.myemail = Response.data[0].email;

            // คือการ refresh หน้า
            // window.location.href = "/home";
            // Navigating to the named route SOURCE : https://michaelnthiessen.com/redirect-in-vue
            this.$router.push({ name: "example" });
          });
      }
    }
  },
  props: {
    source: String
  }
};
</script>
