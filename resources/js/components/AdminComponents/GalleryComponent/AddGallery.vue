<template>
    <v-row >
    <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="primary"
          dark
          v-bind="attrs"
          v-on="on"
        >
            معرض جديد
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
          <v-toolbar-title>  استمارة إدخال معرض جديد </v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn
              dark
              text
              @click="AddGallery"
            >
              حفض
            </v-btn>
          </v-toolbar-items>
        </v-toolbar>

        <v-card-title>

        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row justify="space-between">
              <v-col
                cols="12"
                sm="12"
                md="12"
              >
                <v-text-field
                  label="عنوان المعرض *"
                  required
                  hint="عنوان المعرض "
                  prepend-icon="article"
                  v-model="gallery.title"
                ></v-text-field>
              </v-col>
            </v-row>
             <v-divider></v-divider>
             <v-row>
                <v-col cols="12">
                   <v-file-input
                    chips
                    multiple
                    label="تحميل الصور"
                    clearable
                    @change="changed"
                    ></v-file-input>
                </v-col>
            </v-row>
          </v-container>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {

    data(){
        return{
            loading:false,
            dialog:false,
            gallery:{
                images:{},
                title:'',
            }
        }
    },
    methods:{
        AddGallery(){
            this.dialog=false
            console.log(this.gallery)
        },
        changed(e){
            console.log(e)
            this.loading=true
        }
    }
}
</script>
<style scoped>

</style>
