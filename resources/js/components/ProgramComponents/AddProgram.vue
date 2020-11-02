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

        >
        إضافة حلقة او برنامج جديد
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
          <v-toolbar-title> إضافة معلومات البرنامج  </v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn
              dark
              text
              @click="AddProgram"
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
                sm="6"
                md="5"
              >
                <v-text-field
                  label="إسم البرنامج*"
                  required
                  hint="إسم البرنامج"
                  prepend-icon="person"
                  v-model="Program.title"
                ></v-text-field>
              </v-col>
              <v-col
                cols="12"
                sm="6"
                md="5"
              >
                <v-text-field
                  label="الرابط"
                  hint="إضافة  رابط البرنامج في اليوتيوب"
                  prepend-icon="facebook"
                   v-model="Program.link"
                ></v-text-field>
              </v-col>
            </v-row>
             <v-divider></v-divider>
          </v-container>
          <small class="red--text">*يشير الى ضرورة ملئ الأماكن المطلوبة</small>
        </v-card-text>

      </v-card>
    </v-dialog>
  </v-col>
</template>

<script>

// we have the main root in EnvPath work using this in every file please
import Path from "../../EnvPath";
import {Program} from "../../Models/Models";

const url = Path.baseUrl + "Program";

export default {
    data: function () {
        return {
            Programs: {},
            Program,
            dialog:false,

        }
    },
    mounted(){

    },
    methods: {
        AddProgram() {

            if(Program.link.search('v=')>0){
                this.Program.link= Program.link.split("?v=")[1];
                axios.post( url, this.Program)
                    .then((response) => {
                        // this.$emit('success', response)
                        // this.$emit('ProgramAdded')
                        this.dialog=false

                    })
                    .catch(error => console.log(error));
            }else{
                const response={
                    success:false
                }
                // this.$emit('success', response)
                // this.$emit('ProgramAdded')
            }
        }
    }
}
</script>
