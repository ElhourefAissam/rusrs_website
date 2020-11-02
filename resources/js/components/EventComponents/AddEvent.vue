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
          حدث جديدة
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
          <v-toolbar-title> استمارة إدخال حدث جديد </v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn
              dark
              text
              @click="AddEvent"
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
                  label="عنوان الحدث*"
                  required
                  hint="عنوان الحدث"
                  prepend-icon="article"
                  v-model="Event.title"
                ></v-text-field>
              </v-col>

              <v-col
                cols="12"
                sm="6"
                md="5"
              >
                <v-text-field
                  label="المكان"
                  hint="المكان "
                  prepend-icon="account_circle"
                   v-model="Event.place"
                ></v-text-field>
              </v-col>

               <v-col
                cols="12"
                sm="6"
                md="12"
              >
                <v-text-field
                  label="العنوان"
                  hint="العنوان"
                  prepend-icon="account_circle"
                   v-model="Event.address"
                ></v-text-field>
              </v-col>
                <v-col cols="12">
                <v-textarea
                    label="*توصيف الحدث"
                    required
                    prepend-icon="description"
                    v-model="Event.description"
                 ></v-textarea>
                </v-col>
               <v-col
                cols="12"
                sm="6"
                md="12"
              >
               <v-row cols="12" justify="space-between">
                    <v-col md="5">
                        <v-menu
                            v-model="menu1"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            transition="scale-transition"
                            offset-y
                            min-width="290px"
                            >
                            <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                                v-model="Event.start_date"
                                label="من"
                                prepend-icon="mdi-calendar"
                                readonly
                                v-bind="attrs"
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-date-picker
                            v-model="Event.start_date"
                            @input="menu1 = false"
                            ></v-date-picker>
                        </v-menu>
                    </v-col>
                    <v-col md="5">
                     <v-menu
                        v-model="menu2"
                        :close-on-content-click="false"
                        :nudge-right="40"
                        transition="scale-transition"
                        offset-y
                        min-width="290px"
                        >
                        <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            v-model="Event.end_date"
                            label="الى"
                            prepend-icon="mdi-calendar"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                        ></v-text-field>
                        </template>
                        <v-date-picker
                        v-model="Event.end_date"
                        @input="menu2 = false"
                        ></v-date-picker>
                    </v-menu>
                    </v-col>
               </v-row>
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
  </v-row>
</template>

<script>

// we have the main root in EnvPath work using this in every file please
import Path from "../../EnvPath";
import axios from "axios";
import {Event , UploadImagesModel} from "../../Models/Models";



const url=Path.baseUrl+"Event";
const imageUrl = Path.baseUrl + "imageUpload"

export default {
    data: function () {
        return {
            Events: {},
            Event,
            UploadImagesModel,
            dialog:false,
            menu1:false,
            menu2:false
        }
    },
    created(){

    },
    methods: {
        async AddEvent() {

           axios.post( url , this.Event)
           .then(response=>{
               if(response.data.id){
                   this.UploadImagesModel.formData.append("modelId",response.data.id)
                   //this.addImages()
                    this.$emit('EventAdded', response)
                    this.dialog=false
               }

           }).catch(err=>{
                console.log(err)
            })
        },

        getDateObject(data){
            this.UploadImagesModel.formData = data.formData
            this.UploadImagesModel.config = data.config
        },

        addImages(){
            axios.post(url , this.UploadImagesModel.formData , this.UploadImagesModel.config )
            .then(response=>{
                //this.$emit('EventAdded', response)
                alert('Event was added successfully')
            })
            .catch(err=>{
                console.log(err)
            })
        }

    }
}
</script>
