<template>
<div class="articles" color="grey">
    <notification :notification="notification" />
    <v-container class="my-5 ">
        <h1 class="display2 grey--text">المقالات</h1>
        <v-row justify="space-between">
            <v-col cols="12" md="5" sm="6">
                <v-text-field color="primary darken-2" label="ابحث عن مقالة" v-model="q" @keyup="findArticle" hide-details="auto"></v-text-field>
            </v-col>
            <v-col cols="12" md="4" sm="6">
                <addArticle @articleAdded="articleAdded"></addArticle>
            </v-col>
        </v-row>

        <v-card class="my-2 pa-2" flat>
            <v-row>
                <v-col cols="12" md="2" sm="4">
                    <h3 class="subtitle-1 grey--text">عنوان المقالة</h3>
                </v-col>
                <v-col cols="12" md="3" sm="4">
                    <div class="subtitle-1 grey--text">نص المقالة</div>
                </v-col>
                <v-col cols="12" md="2" sm="4">
                    <div class="subtitle-1 grey--text">كاتب المقالة </div>
                </v-col>
                <v-col cols="12" md="2" sm="4">
                    <div class="subtitle-1 grey--text">تاريخ الكتابة</div>
                </v-col>
                <v-col cols="12" md="3" sm="4">

                </v-col>
            </v-row>
        </v-card>
        <div v-if="articles.data.length >0">
            <v-card flat v-for="article in articles.data" :key="article.id" class="pa-3">
                <v-row>
                    <v-col cols="12" md="2" sm="4">
                        <div>{{article.title}}</div>
                    </v-col>
                    <v-col cols="12" md="3" sm="4">
                        <div>{{ article.article_body | subStr }}</div>
                    </v-col>
                    <v-col cols="12" md="2" sm="4">
                        <div>{{ article.author | subStr }}</div>
                    </v-col>
                    <v-col cols="12" md="2" sm="4">
                        <div>{{ article.created_at | adjustDate }}</div>
                    </v-col>
                    <v-col cols="12" md="3" sm="4">
                        <v-row cols="12" no-gutters>
                            <showArticle :article="article" />
                            <editArticle @articleUpdated="articleUpdated" :article="article" />
                            <deleteArticle @articleDeleted="articleDeleted" :article="article" />
                        </v-row>
                    </v-col>
                </v-row>
                <v-divider></v-divider>
            </v-card>
        </div>
        <div v-else>
            <v-card flat>
                <v-row class="text-center pa-4" justify-md="center" justify="center">
                    <h3 class="grey--text lighten-1">لا توجد مقالات</h3>
                </v-row>
            </v-card>
        </div>
        <div class="container-small mb-3">
            <pagination :data="articles" @pagination-change-page="articles" class="mt-5"></pagination>
        </div>
    </v-container>
</div>
</template>

<script>
import {
    notification,
    notify
} from "../../../Models/Models";
import articleService from "../../../Services/ArticleService";

import addArticle from "./AddArticle";
import editArticle from "./EditArticle";
import showArticle from "./ShowArticle";
import deleteArticle from "./DeleteArticle";

export default {

    components: {
        addArticle,
        editArticle,
        showArticle,
        deleteArticle
    },

    data: function () {
        return {
            q: '',
            notification,
            articles: {
                data: []
            }
        };
    },
    async mounted() {
        await this.getResults()
    },
    methods: {

        async getResults() {
                this.articles = await articleService.listOfArticles(this.q)
            }

            ,
        findArticle() {
            this.getResults(this.q)
        }

        ,
        articleAdded(isAdded = false) {
            isAdded ? this.sendNofitication() : this.sendErrorNotification()
        }

        ,
        articleUpdated(isUpdated) {
            isUpdated ? this.sendNofitication() : this.sendErrorNotification()
        }

        ,
        articleDeleted(isDeleted) {
            isDeleted ? this.sendNofitication() : this.sendErrorNotification()
        }

        ,
        sendNofitication() {
            this.getResults()
            this.notification = {
                ...notify("لقد تم بنجاح", "orange")
            }
        },
        sendErrorNotification() {
            this.notification = {
                ...notify("لم يتم بنجاح !", "error")
            }
        }

    },
    filters: {
        subStr: (string) => string ? string.substring(0, 80) + '...' : '',
        adjustDate: (date) => date ? date.substring(0, 10) : 'لا يوجد تاريخ'
    }
};
</script>
