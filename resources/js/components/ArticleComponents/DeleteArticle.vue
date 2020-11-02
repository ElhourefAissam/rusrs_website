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
           هل تريد مسح هذه المقالة؟
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
            @click="DeleteArticle"
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

const url=Path.baseUrl+"Article";

export default {
    props: ['article'],
    data: function () {
        return {
            dialog:false
        }
    },
    methods: {
        DeleteArticle: function () {

            const param = this.article.id ? '/' + this.article.id : '';

            axios.delete(url + param)
                .then((response) => {
                    this.dialog = false
                    // if(response.data.deleted===true)
                    // {
                    // }

                    // this.$emit('ArticleDeleted', response)
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
