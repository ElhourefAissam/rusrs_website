<template>
<div>
    <v-btn
      color="error"
      dark
      @click.stop="dialog = true"
      small
    >
      <v-icon>delete</v-icon>
    </v-btn>

    <v-dialog
      v-model="dialog"
      max-width="290"
    >
      <v-card>
        <v-card-title class="headline">
           تنبيه؟
        </v-card-title>

        <v-card-text>
           هل تريد مسح هذا المعرض ؟
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="green darken-1"
            text
            @click="dialog = false"
          >
            لا
          </v-btn>

          <v-btn
            color="green darken-1"
            text
            @click="DeleteGallery"
          >
            نعم
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
export default {

    data(){
        return{
            dialog:false
        }
    },
    methods:{
        DeleteGallery(){
            this.dialog=false
        }
    }
}
</script>
<style scoped>

</style>
