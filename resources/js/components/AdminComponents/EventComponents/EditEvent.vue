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
          color="success"
          dark
          v-bind="attrs"
          v-on="on"
          small
        ><v-icon>edit</v-icon></v-btn>
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
          <v-toolbar-title>استمارة  تعديل الفعالية</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn
              dark
              text
              @click="UpdateEvent"
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
              <form ref="form">
            <v-row justify="space-between">

              <v-col
                cols="12"
                sm="6"
                md="5"
              >
                <v-text-field
                  label="عنوان الفعالية*"
                  required
                  :rules="rules"
                  hint="عنوان الفعالية"
                  prepend-icon="article"
                  v-model="UpdatedEvent.title"
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
                  :rules="rules"
                  prepend-icon="account_circle"
                   v-model="UpdatedEvent.place"
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
                   v-model="UpdatedEvent.address"
                ></v-text-field>
              </v-col>
                <v-col cols="12">
                <v-textarea
                    label="*توصيف الفعالية"
                    required
                    :rules="rules"
                    prepend-icon="description"
                    v-model="UpdatedEvent.description"
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
                                v-model="UpdatedEvent.start_date"
                                label="من"
                                :rules="rules"
                                prepend-icon="calendar"
                                readonly
                                v-bind="attrs"
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-date-picker
                            v-model="UpdatedEvent.start_date"
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
                            v-model="UpdatedEvent.end_date"
                            label="الى"
                            :rules="rules"
                            prepend-icon="calendar"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                        ></v-text-field>
                        </template>
                        <v-date-picker
                        v-model="UpdatedEvent.end_date"
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
            </form>
          </v-container>
          <small class="red--text">*يشير الى ضرورة ملئ الأماكن المطلوبة</small>
        </v-card-text>

      </v-card>
    </v-dialog>
  </v-col>
</template>

<script>
import Path from "../../../EnvPath";

const url=Path.baseUrl+"Event/";


export default {
    props: ['Event'],
    data: function () {
        return {
            dialog:false,
            menu1:false,
            menu2:false,
            UpdatedEvent:{...Event},
            error:false,
            rules:[
                v=> v.length > 0 || 'المرجو ملئ الأماكن الفارغة'
            ],
        }
    },
    methods: {
        UpdateEvent: function () {
            this.error= ! this.$refs.form.validate()
            if(this.$refs.form.validate()){
                axios.put(url + this.UpdatedEvent.id, {...this.UpdatedEvent})
                    .then((response) => {
                        this.$emit('EventUpdated', response)
                        this.dialog=false
                    })
                    .catch(error => console.log(error));
            }
        }
    }
}
</script>
<style scoped>

</style>
