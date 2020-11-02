<template>
<<<<<<< HEAD
<div>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="DetailsModal" tabindex="-1" aria-labelledby="DetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title alert alert-info w-100" id="DetailsModalLabel">Program Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    <h4>{{Program.title}}</h4>
                                    <video-player :id="Program.link" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button @click="stopVideo" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
=======
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
>>>>>>> 6a58afcbe6af4ff0bcc0f5ab09368eac8944e307

    <videoPlayer :id="ShowProgram.link"/>

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
import Path from "../../EnvPath";
import videoPlayer from "../VideoComponents/displayVideo";

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
<<<<<<< HEAD
    methods: {
        stopVideo() {
            this.Program.link = ""
        }
=======
    methods:{
        stopVideo(){
            this.ShowProgram.link=""
        },
        exit(){
            this.ShowProgram.link=""
            this.dialog=false
        },
>>>>>>> 6a58afcbe6af4ff0bcc0f5ab09368eac8944e307
    },
    computed: {

    }
}
</script>
