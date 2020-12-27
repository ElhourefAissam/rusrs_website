<template>
  <section class="block latestPostBlock" id="articles">
    <v-container>
      <h2 class="text-center grey--text">مقالات</h2>
      <v-row>
        <v-col v-for="article in articles.data" :key="article.id" cols="12" xl="4" md="4" sm="12">
          <v-card class="mx-auto" outlined>
            <v-img
              class="white--text align-end"
              height="200px"
              src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
            >
              <v-card-title>{{ article.title }}</v-card-title>
            </v-img>

            <v-card-subtitle class="pb-0"> Number {{ i++ }} </v-card-subtitle>

            <v-card-text class="text--primary">
              <div>Whitehaven Beach</div>

              <div>Whitsunday Island, Whitsunday Islands</div>
            </v-card-text>

            <v-card-actions>
              <showArticle flat :article="article" id="show" />
              <!-- <v-btn color="orange darken-1 white--text"> -->
              المزيد...
              <!-- </v-btn> -->
              <!-- </showArticle> -->
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </section>
</template>

<script>
import articleService from "../../Services/ArticleService";
import showArticle from "../AdminComponents/ArticleComponents/ShowArticle";
export default {
  components: {
    showArticle,
  },
  data() {
    return {
      articles: {},
      i: 1,
    };
  },
  async mounted() {
    await this.getResults();
  },
  methods: {
    async getResults() {
      this.articles = await articleService.listOfArticles(this.q);
      // console.log(this.articles.data)
    },
  },
};
</script>

<style scoped></style>
>
