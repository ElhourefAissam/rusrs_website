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
import articleService from "../../../Services/ArticleService";

export default {
    props: ['article'],
    data: function () {
        return {
            dialog:false
        }
    },
    methods: {
        DeleteArticle: async function () {
            const isDeleted = await articleService.deleteArticle(this.article.id)
            this.$emit('articleDeleted', isDeleted.success)
            this.dialog = false
        },
    },
}
</script>
