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
        إضافة عضو جديد
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
              @click="AddMember"
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
                  label="الاسم الكامل*"
                  required
                  :rules="rules"
                  hint="الاسم الكامل"
                  prepend-icon="person"
                  v-model="Member.full_name"
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
                   v-model="Member.facebook"
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field
                  label="المنصب*"
                  :rules="rules"
                  required
                  prepend-icon="description"
                   v-model="Member.position"
                ></v-text-field>
              </v-col>
            </v-row>
             <v-divider></v-divider>
             <v-row>
                <v-col cols="12">
                   <v-file-input
                    chips
                    label="تحميل الصورة"
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
import { Member , UploadImagesModel } from "../../../Models/Models"
import memberService from "../../../Services/MemberService";

export default {
    data: function () {
        return {
            Member,
            UploadImagesModel,
            dialog:false,
             rules:[
                v=> v.length > 0 || 'المرجو ملئ الأماكن الفارغة'
            ],
            error:false
        }
    },
    methods: {
        async AddMember() {
            if (this.$refs.form.validate()) {
                const isAdded = await memberService.addMember(this.Member)
                this.$emit("memberAdded", isAdded.success);
                // this.UploadImagesModel.formData.append("modelId",isAdded.id)
                // this.addImages()
                this.dialog=false
            }else{
                this.error = !this.$refs.form.validate();
            }
        },

        getDateObject(data) {
            // this.UploadImagesModel.formData = data.formData;
            // this.UploadImagesModel.config = data.config;
        },

        addImages() {

            // memberService.addMember()
            // axios
            //     .post(
            //         url,
            //         this.UploadImagesModel.formData,
            //         this.UploadImagesModel.config
            //     )
            //     .then(response => {
            //         this.dialog = false;
            //         this.$emit("memberAdded");
            //     })
            //     .catch(err => {
            //         console.log(err);
            //     });
        },
        resetValidation(){
            this.error=false
            this.dialog=false
        }
    }
}
</script>
