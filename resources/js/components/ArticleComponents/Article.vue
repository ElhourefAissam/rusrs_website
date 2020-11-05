<template>
<div class="articles" color="grey">
    <v-container class="my-5 ">
        <h1 class="display2 grey--text">المقالات</h1>
        <v-row justify="space-between">
            <v-col cols="12" md="5" sm="6">
                <v-text-field color="primary darken-2" label="ابحث عن مقالة" @keyup="FindArticle" v-model="q" hide-details="auto"></v-text-field>
            </v-col>
            <v-col cols="12" md="4" sm="6">
                <addArticle></addArticle>
            </v-col>
        </v-row>

        <v-card class="my-2 pa-2" flat>
            <v-row>
                <v-col cols="12" md="4" sm="4">
                    <h3 class="subtitle-1 grey--text">عنوان المقالة</h3>
                </v-col>
                <!-- <v-col cols="12" md="3" sm="4">
                    <div class="subtitle-1 grey--text">نص المقالة</div>
                </v-col> -->
                <v-col cols="12" md="2" sm="4">
                    <div class="subtitle-1 grey--text">كاتب المقالة </div>
                </v-col>
                <v-col cols="12" md="3" sm="4">
                    <div class="subtitle-1 grey--text">تاريخ الكتابة</div>
                </v-col>
                <v-col cols="12" md="3" sm="4">

                </v-col>
            </v-row>
        </v-card>
        <v-card v-for="article in Articles.data" :key="article.id" flat class="pa-3">
            <v-row>
                <v-col cols="12" md="4" sm="4">
                    <div>{{article.title}}</div>
                </v-col>
                <!-- <v-col cols="12" md="3" sm="4">
                    <div>{{ article.article_body | subStr }}</div>
                </v-col> -->
                <v-col cols="12" md="2" sm="4">
                    <div>{{ article.author | subStr }}</div>
                </v-col>
                <v-col cols="12" md="3" sm="4">
                    <div>{{ article.created_at }}</div>
                </v-col>
                <v-col cols="12" md="3" sm="4">
                    <v-row cols="12" no-gutters>
                        <showArticle :article="article" @ArticleAdded="getResults" />
                        <editArticle :article="article" @ArticleUpdated="getResults" />
                        <deleteArticle :article="article" @ArticleDeleted="getResults" />
                    </v-row>
                </v-col>
            </v-row>
            <v-divider></v-divider>
        </v-card>
        <div class="container-small mb-3">
            <pagination :data="Articles" @pagination-change-page="getResults" class="mt-5"></pagination>
        </div>
    </v-container>
</div>
</template>

<script>
// we have the main root in EnvPath work using this in every file please
import Path from "../../EnvPath";
import addArticle from "./AddArticle";
import editArticle from "./EditArticle";
import showArticle from "./ShowArticle";
import deleteArticle from "./DeleteArticle";

const url = Path.baseUrl + "Article";

export default {

    components: {
        addArticle,
        editArticle,
        showArticle,
        deleteArticle
    },
    created() {
        this.getResults();
    },
    data: function () {
        return {
            Articles: {},
            article: {},
            q: '',
            rules: []
        };
    },
    mounted() {

    },
    methods: {
        getResults(page = 1) {
            axios.get(url + '?page=' + page)
                .then(response => {
                    this.Articles = response.data;
                });
        },

        getArticle(article) {
            this.article = {
                ...article
            };
        },
        FindArticle() {
            if (this.q.length > 0) {
                axios.get(url + '/' + this.q)
                    .then(response => {
                        this.Articles = response.data;
                    });
            } else this.getResults();
        },
    },
    filters: {
        subStr: function (string) {
            return string.substring(0, 15) + '...';
        }
    }
};
</script>

<style>
</style>
