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
          <v-toolbar-title> تعديل معلومات العضو </v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn
              dark
              text
              @click="UpdateMember"
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
                  label="الاسم الكامل*"
                  required
                  hint="الاسم الكامل"
                  prepend-icon="person"
                  v-model="updatedMember.full_name"
                ></v-text-field>
              </v-col>
              <v-col
                cols="12"
                sm="6"
                md="5"
              >
                <v-text-field
                  label="الفايسبوك"
                  hint="الفايسبوك"
                  prepend-icon="facebook"
                   v-model="updatedMember.facbeook"
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field
                  label="منصب*"
                  required
                  prepend-icon="description"
                   v-model="updatedMember.position"
                ></v-text-field>
              </v-col>
            </v-row>
             <v-divider></v-divider>
             <v-row>
                <v-col cols="12">
                   <v-file-input
                    chips
                    multiple
                    label="تحميل الصورة"
                    ></v-file-input>
                </v-col>
            </v-row>
          </v-container>
          <small class="red--text">*يشير الى ضرورة ملئ الأماكن المطلوبة</small>
        </v-card-text>

      </v-card>
    </v-dialog>
  </v-col>
</template>

<script>
import Path from "../../EnvPath";

const url=Path.baseUrl+"Member/";


export default {
    props: ['Member'],
    data: function () {
        return {
            dialog: false,
            notifications: false,
            sound: true,
            widgets: false,
            updatedMember:{...this.Member}
        }
    },
    methods: {
        UpdateMember: function () {
            axios.put(url + this.updatedMember.id, {...this.updatedMember})
                .then((response) => {
                    this.$emit('MemberUpdated', response)
                    this.dialog=false
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
