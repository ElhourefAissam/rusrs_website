<template>

<v-col md="4">
    <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="warning"
          dark
          v-bind="attrs"
          v-on="on"
          small
        >
          <v-icon>edit</v-icon>
        </v-btn>
      </template>
      <v-card>
        <v-toolbar
          dark
          color="primary"
        >
          <v-btn
            icon
            dark
            @click="dialog = false"
          >
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title> تعديل المقالة </v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn
              dark
              text
              @click="UpdateArticle"
            >
              حفض
            </v-btn>
          </v-toolbar-items>
        </v-toolbar>

        <v-card-title>

        </v-card-title>
        <v-card-text>
          <v-container>
              <v-alert
                    text
                    outlined
                    color="error"
                    icon="fire"
                    v-if="error"
                >
                    <v-btn class="ml-3" x-small text fab @click="error = !error">
                        <v-icon>close</v-icon>
                    </v-btn>
                    <span class="white-text "
                        >هناك خطأ ، المرجو إدخال معلومات صحيحة !!!</span
                    >
                </v-alert>
               <v-form ref="form">
            <v-row justify="space-between">
              <v-col
                cols="12"
                sm="6"
                md="5"
              >
                <v-text-field
                  label="عنوان المقالة*"
                  required
                  hint="عنوان المقالة"
                  prepend-icon="article"
                  v-model="updatedArticle.title"
                  :rules="rules"
                ></v-text-field>
              </v-col>
              <v-col
                cols="12"
                sm="6"
                md="5"
              >
                <v-text-field
                  label="كاتب المقالة"
                  hint="كاتب المقالة"
                  prepend-icon="account_circle"
                   v-model="updatedArticle.author"
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-textarea
                  label="نص المقالة*"
                  required
                  prepend-icon="description"
                   v-model="updatedArticle.article_body"
                ></v-textarea>
              </v-col>
            </v-row>
             <v-divider></v-divider>
             <v-row>
                <v-col cols="12">
                   <v-file-input
                    chips
                    multiple
                    label="تحميل الصور"
                    ></v-file-input>
                </v-col>
            </v-row>
               </v-form>
          </v-container>

        </v-card-text>

      </v-card>
    </v-dialog>
  </v-col>
</template>

<script>
import Path from "../../../EnvPath";


const url=Path.baseUrl+"Article/";


export default {
    props: ['article'],
    data: function () {
        return {
            dialog: false,
            notifications: false,
            sound: true,
            widgets: false,
            updatedArticle:{...this.article},
            rules:[
                v=> v.length > 0 || 'المرجو ملئ الأماكن الفارغة'
            ],
            error:false
        }
    },
    methods: {
        UpdateArticle: function () {
            this.error= ! this.$refs.form.validate()
            if(this.$refs.form.validate()){
                axios.put(url + this.updatedArticle.id, {...this.updatedArticle})
                    .then((response) => {
                        this.dialog = false
                        this.$emit("articleUpdated")
                    })
                    .catch(error => console.log(error));
            }
        }
    }
}
</script>
