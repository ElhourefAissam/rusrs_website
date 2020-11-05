<template>
<div class="articles" color="grey">
     <notification :notification="notification"/>
     <v-container class="my-5 ">
        <h1 class="display2 grey--text">المقالات</h1>
           <v-row justify="space-between">
                <v-col cols="12" md="5" sm="6">
                    <v-text-field
                        color="primary darken-2"
                        label="ابحث عن مقالة"
                        v-model="q"
                        @keyup="findArticle"
                        hide-details="auto"
                    ></v-text-field>
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
        <div v-if="Articles.data.length >0" >
            <v-card flat v-for="article in Articles.data" :key="article.id" class="pa-3">
                <v-row >
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
                        <v-row cols="12"  no-gutters>
                            <showArticle    :article="article"/>
                            <editArticle   @articleUpdated="articleUpdated"   :article="article"/>
                            <deleteArticle @articleDeleted="articleDeleted"  :article="article"/>
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
            <pagination :data="Articles" @pagination-change-page="getResults" class="mt-5"></pagination>
        </div>
     </v-container>
</div>
</template>

<script>
// we have the main root in EnvPath work using this in every file please
import Path from "../../../EnvPath";
import {notification, notify} from "../../../Models/Models";

import addArticle from "./AddArticle";
import editArticle from "./EditArticle";
import showArticle from "./ShowArticle";
import deleteArticle from "./DeleteArticle";

const url = Path.baseUrl + "Article";

let created=false

export default {

    components:{
        addArticle,
        editArticle,
        showArticle,
        deleteArticle
    },
    data: function () {
        return {
            Articles: {
                data:[]
            },
            q: '',
            rules:[],
            notification,
        };
    },
    created(){
        created = this.getResults()
    },
    methods: {

        getResults(page = 1) {
          return axios.get(url + '?page=' + page)
                .then(response => {
                    this.Articles = {...response.data};
                }).then(x => true);
        },

        findArticle() {
            if (this.q.length > 0) {
                axios.get(url + '/' + this.q)
                    .then(response => {
                        this.Articles = {...response.data};
                    });
            } else this.getResults();
        },

        articleAdded(isAdded){
            if(isAdded)
            {
                this.getResults()
                this.notification={...notify("لقد تم بنجاح","orange")}
            }else{
                this.notification={...notify("لم يتم بنجاح !","orange")}
            }
        },
        articleUpdated(isUpdated){
            if(isUpdated){
                this.getResults()
                this.notification={...notify("لقد تم بنجاح","orange")}
            }
        },
        articleDeleted(isDeleted){
            if(isDeleted){
                this.getResults()
                this.notification={...notify("لقد تم بنجاح","orange")}
            }
        },


    },
    filters: {
        subStr: function (string) {
            return string ? string.substring(0, 80) + '...' : '';
        },
        adjustDate(date){
            return date? date.substring(0, 10):'لا يوجد تاريخ';
        }
    }
};
</script>

<style>
</style>
