<template>
   <div >
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
          small
        > <v-icon>edit</v-icon> </v-btn>
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
          <v-toolbar-title>  استمارة تعديل  معرض  </v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn
              dark
              text
              @click="EditGallery"
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
                    ></v-file-input>
                </v-col>
            </v-row>
          </v-container>
          <small class="red--text">*يشير الى ضرورة ملئ الأماكن المطلوبة</small>
        </v-card-text>

      </v-card>
    </v-dialog>
  </div>
</template>
<script>
export default {
    props:["gallery"],
    data(){
        return{
            dialog:false
        }
    },
    methods:{
        EditGallery(){
            this.dialog=false
        }
    }
}
</script>
<style scoped>

</style>
