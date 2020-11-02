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
                  hint="إضافة  رابط البرنامج في اليوتيوب"
                  prepend-icon="facebook"
                   v-model="UpdatedProgram.link"
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
import Path from "../../EnvPath";

const url = Path.baseUrl + "Program/";


export default {
    props: ['Program'],
    data: function () {
        return {
            dialog:false,
            UpdatedProgram:{...this.Program}
        }
    },
    methods: {
        UpdateProgram: function () {

            axios.put(url + this.UpdatedProgram.id, {...this.UpdatedProgram})
                .then((response) => {
                    this.$emit('ProgramUpdated', response)
                    this.dialog=false
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
