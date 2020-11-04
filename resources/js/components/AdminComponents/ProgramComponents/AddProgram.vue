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
             <v-form ref="AddProgFrom">
                <v-row justify="space-between">
                <v-col
                    cols="12"
                    sm="6"
                    md="5"
                >
                    <v-text-field
                    label="إسم البرنامج*"
                    required
                    :rules="rules"
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
                   :rules="rules"
                  hint="إضافة  رابط البرنامج في اليوتيوب"
                  prepend-icon="youtube_searched_for"
                   v-model="Program.link"
                ></v-text-field>
              </v-col>
            </v-row>
             <v-divider></v-divider>
             </v-form>
          </v-container>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-col>
</template>

<script>

// we have the main root in EnvPath work using this in every file please
import Path from "../../../EnvPath";
import {Program} from "../../../Models/Models";

const url = Path.baseUrl + "Program";

export default {
    data: function () {
        return {
            Programs: {},
            Program,
            dialog:false,
             rules:[
                v=> v.length > 0 || 'المرجو ملئ الأماكن الفارغة'
            ],
            error:false,

        }
    },
    mounted(){

    },
    methods: {
        AddProgram() {
            this.error= ! this.$refs.AddProgFrom.validate()

            if(this.$refs.AddProgFrom.validate()){

                if(Program.link.search('v=')>0){

                    this.Program.programId = Program.link.split("?v=")[1];

                    axios.post( url, this.Program)
                        .then((response) => {
                            // this.$emit('success', response)
                            // this.$emit('ProgramAdded')
                            this.dialog = false
                        })
                        .catch(error => console.log(error));
                }else{
                    const response={
                        success:false
                    }
                }
        }
      }
    }
}
</script>
