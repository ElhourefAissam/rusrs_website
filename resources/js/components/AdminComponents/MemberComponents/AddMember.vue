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
// we have the main root in EnvPath work using this in every file please
import Path from "../../../EnvPath";
import { Member , UploadImagesModel } from "../../../Models/Models"

const url = Path.baseUrl + "Member";

export default {
    data: function () {
        return {
            Members: {},
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
        AddMember() {
            this.error= ! this.$refs.form.validate()
            if(this.$refs.form.validate()){
                axios.post(url, this.Member)
                    .then((response) => {
                        const isAdded = response.data.success;

                        if(isAdded){
                            this.UploadImagesModel.formData.append("modelId",response.data.id)
                            this.$emit('memberAdded', response)
                            //this.addImages()
                            this.dialog=false
                        }else{
                            this.UploadImagesModel.formData.append("error","ID does not exist")
                        }
                    })
                    .catch(error => console.log(error));
            }
        },

        getDateObject(data){
            this.UploadImagesModel.formData = data.formData
            this.UploadImagesModel.config = data.config
        },

        addImages(){
            axios.post(url , this.UploadImagesModel.formData , this.UploadImagesModel.config )
            .then(response=>{
                // notify
            })
            .catch(err=>{
                console.log(err)
            })
        }
    }
}
</script>
