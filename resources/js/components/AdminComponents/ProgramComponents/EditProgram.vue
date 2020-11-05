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
          <v-toolbar-title> تعديل معلومات البرنامج  </v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn
              dark
              text
              @click="UpdateProgram"
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
                  label="إسم البرنامج*"
                  required
                  hint="إسم البرنامج"
                   :rules="rules"
                  prepend-icon="person"
                  v-model="UpdatedProgram.title"
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
                  prepend-icon="facebook"
                   v-model="UpdatedProgram.link"
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
import Path from "../../../EnvPath";

const url = Path.baseUrl + "Program/";


export default {
    props: ['Program'],
    data: function () {
        return {
            dialog:false,
            UpdatedProgram:{...this.Program},
             rules:[
                v=> v.length > 0 || 'المرجو ملئ الأماكن الفارغة'
            ],
            error:false,
        }
    },
    methods: {
        UpdateProgram: function () {
            this.error= ! this.$refs.form.validate()
            if(this.$refs.form.validate()){
                 this.UpdateProgram.programId = UpdatedProgram.link.split("?v=")[1];

                 axios.put(url + this.UpdatedProgram.id, {...this.UpdatedProgram})
                    .then((response) => {
                        this.$emit('ProgramUpdated', response)
                        this.dialog=false
                    })
                    .catch(error => console.log(error));
        }
       }
    }
}
</script>
