<template>
<v-col md="4">
<v-dialog
       v-model="dialog"
       transition="dialog-bottom-transition"
       max-width="800px"
       persistent
    >
    <template v-slot:activator="{ on, attrs }">
        <v-btn
            color="primary"
            dark
            v-bind="attrs"
            v-on="on"
            small
        >
        <v-icon>info</v-icon>
        </v-btn>
    </template>

  <v-card
    class="mx-auto"
    max-width="800"
  >

    <videoPlayer :id="ShowProgram.programId"/>

    <v-card-title>{{ShowProgram.title}}</v-card-title>
    <v-card-actions>
      <v-btn
        color="orange"
        text
        @click="exit"
      >
        خروج
      </v-btn>
    </v-card-actions>
  </v-card>
</v-dialog>
</v-col>
</template>

<script>
import Path from "../../../EnvPath";
import videoPlayer from "../../VideoComponents/displayVideo";

const url = Path.baseUrl + "Program";

export default {
    components:{
        videoPlayer
    },
    props: ['Program'],
    data: function () {
        return {
            dialog:false,
            ShowProgram:{...this.Program}
        }
    },
    methods:{
        stopVideo(){
            this.ShowProgram.link=""
        },
        exit(){
            this.ShowProgram.link=""
            this.dialog=false
        },
    },
    computed: {

    }
}
</script>
