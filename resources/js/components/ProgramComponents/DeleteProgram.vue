<template>

<v-col md="4">
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
           هل تريد مسح البرنامج  ؟
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
            @click="DeleteProgram"
          >
            نعم
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-col>
</template>

<script>
import Path from "../../EnvPath";

const url=Path.baseUrl + "Program";

export default {
    props: ['Program'],
    data: function () {
        return {
            dialog:false
        }
    },
    methods: {
        DeleteProgram: function () {

            const param = this.Program.id ? '/' + this.Program.id : '';

            axios.delete(url + param)
                .then((response) => {
                    this.$emit('ProgramDeleted', response)
                    this.dialog=false
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
