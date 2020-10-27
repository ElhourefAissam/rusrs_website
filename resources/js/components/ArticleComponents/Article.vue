<template>
<div>
    <Add-Article class=" m-3" @ArticleAdded="getResults"></Add-Article>
    <div class=" container-small">
        <input type="text" class="form-control" @keyup="FindArticle" v-model="q" placeholder="Recherche">
    </div>
    <div class=" list-group mb-3" v-for="article in Articles.data" :key="article.id">
        <div class="list-group-item m-lg-1">
            <h3><a href="#"> <span>{{article.NomFr}}</span> &ThinSpace; <span class=" float-right">{{article.NomAr}}</span></a></h3>
            <div class="inline">
                <small class="float-left col-6">{{article.AdressFr}}</small>
                <small class="float-right col-6 text-lg-right">{{article.AdressAr}}</small>
            </div>
            <div class="inline text-md-center mt-5">
                <router-link :to="{name :'ShowArticle', params:{id:article.id}}" class="btn btn-primary">Detail</router-link>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#EditModal" @click="getArticle(article)">
                    Modifie
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal" @click="getArticle(article)">
                    Supprimer
                </button>
            </div>
        </div>
    </div>
    <div>
        <Edit-Article :article="article" @ArticleUpdated="getResults"></Edit-Article>
        <Delete-Article :article="article" @ArticleDeleted="getResults"></Delete-Article>
    </div>
    <div class="">
        <pagination :data="Articles" @pagination-change-page="getResults" class="mt-5"></pagination>
    </div>
    <div v-if="!this.Articles" class=" alert-danger">
        <h3>No Articles load!!</h3>
    </div>
</div>
</template>

<script>
export default {
    data: function () {
        return {
            Articles: {},
            article: {},
            q: '/'
        }
    },
    mounted() {
        this.getResults();
    },
    methods: {
        getResults(page = 1) {
            axios.get('http://rusrs-website.test/api/Article' + this.q + '?page=' + page)
                .then(response => {
                    this.Article = response.data;
                });
        },
        getArticle(article) {
            this.article = article;
        },
        refresh(Articles) {
            this.Articles = Articles.data;
        },
        FindArticle() {
            if (this.q.length > 0) {
                axios.get('http://rusrs-website.test/api/Article/' + this.q)
                    .then(response => {
                        this.Articles = response.data;
                    });
            } else
                this.getResults();
        }
    }
}
</script>
