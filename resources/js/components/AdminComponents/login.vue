<template>
  <v-row>
    <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn color="primary" dark v-bind="attrs" v-on="on"> تسجيل </v-btn>
      </template>
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark>
            <v-icon @click="dialog = false">close</v-icon>
          </v-btn>
          <v-toolbar-title> استمارة إدخال مقالة جديدة </v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>

        <v-card-title> </v-card-title>
        <v-card-text>
          <v-container>
            <v-alert text outlined color="error" icon="fire" v-if="!valid">
              <v-btn class="ml-3" x-small text fab @click="error = !valid">
                <v-icon>close</v-icon>
              </v-btn>
              <span class="white-text">هناك خطأ ، المرجو إدخال معلومات صحيحة !!!</span>
            </v-alert>

            <v-form ref="form">
              <v-row justify="space-between">
                <v-text-field
                  v-model="email"
                  label="البريد الالكتروني"
                  required
                ></v-text-field>
                <v-text-field
                  v-model="password"
                  type="password"
                  label="كلمة السر"
                  required
                ></v-text-field>

                <v-btn class="mr-4" @click="login"> تسجيل </v-btn>
              </v-row>
              <v-divider></v-divider>
              <v-row>
                <v-col cols="12"> </v-col>
              </v-row>
            </v-form>
          </v-container>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  data: () => {
    return {
      self: this,
      loading: false,
      dialog: false,
      valid: true,
      user: {},
      email: null,
      password: null,
    };
  },

  methods: {
    login: function () {
      const l = axios
        .post("/api/user/login", {
          email: this.email,
          password: this.password,
        })
        .then((response) => {
          location.reload();
          this.dialog = false;
        })
        .catch((error) => console.log(error));
    },
  },
};
</script>

<style></style>
