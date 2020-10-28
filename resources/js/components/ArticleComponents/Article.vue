<template>
<div>
    <div class="card-body">
        <div class="dropdown float-right position-relative">

        </div>
        <h4 class="card-title d-block alert alert-info my-2">List of all articles</h4>
        <Add-Article class="m-3" @ArticleAdded="getResults"></Add-Article>
        <div class="container-small mb-3">
            <input type="text" class="form-control text-center" @keyup="FindArticle" v-model="q" placeholder="Search">
        </div>
        <div class="table-responsive">
            <table class="table table-borderless table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <!-- <th>Body</th> -->
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="article in Articles.data" :key="article.id">
                        <th>{{ article.id }}</th>
                        <!-- <th>{{ article.artical_body }}</th> -->
                        <td>{{ article.title }}</td>
                        <td>{{ article.created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DetailsModal" @click="getArticle(article)">
                                Details
                            </button>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#EditModal" @click="getArticle(article)">
                                Modify
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal" @click="getArticle(article)">
                                delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <Edit-Article :article="article" @ArticleUpdated="getResults"></Edit-Article>
                <Delete-Article :article="article" @ArticleDeleted="getResults"></Delete-Article>
                <Show-Article :article="article"></Show-Article>
            </div>
            <div class="">
                <pagination :data="Articles" @pagination-change-page="getResults" class="mt-5"></pagination>
            </div>
        </div>
    </div>
</div>
</template>

<script>
// we have the main root in EnvPath work using this in every file please
import Path from "../../EnvPath";

const url = Path.baseUrl + "Article";

export default {
    data: function () {
        return {
            Articles: {},
            article: {},
            q: '',
        };
    },

    mounted() {
        this.getResults();
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
};
</script>

<style>
</style>
