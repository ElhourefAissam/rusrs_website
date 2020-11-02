<template>

<v-col md="4">
    <v-dialog
      v-model="dialog"
      transition="dialog-bottom-transition"
       hide-overlay
       max-width="900px"
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
    max-width="900"
  >
    <v-img
      src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
      height="200px"
    ></v-img>

    <v-card-title>
      {{article.title}}
    </v-card-title>

    <v-card-actions>
        <v-btn
            icon
            @click="show = !show"
            fab
            class="primary"
        >
        <v-icon large >{{ show ? 'expand_less' : 'expand_more' }}</v-icon>
      </v-btn>
    </v-card-actions>

    <v-expand-transition>
      <div v-show="show">
        <v-divider></v-divider>

        <v-card-text>
         <p>
             {{article.article_body}}
         </p>
        </v-card-text>
      </div>
    </v-expand-transition>
  </v-card>

</v-dialog>
</v-col>
</template>


<script>
import Path from "../../EnvPath";

const url = Path.baseUrl + "Article";

export default {
    props: ["article"],

    data () {
        return {
            dialog: false,
            show:false,
        }
    },
    computed: {},
}
</script>
