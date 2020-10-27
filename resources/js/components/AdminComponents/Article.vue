<template>
<div>
    <div class="card-body">
        <div class="dropdown float-right position-relative">
            <a href="#" class="dropdown-toggle h4 text-muted" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#" class="dropdown-item">Action</a></li>
                <li><a href="#" class="dropdown-item">Another action</a></li>
                <li><a href="#" class="dropdown-item">Something else here</a></li>
                <li class="dropdown-divider"></li>
                <li><a href="#" class="dropdown-item">Separated link</a></li>
            </ul>
        </div>
        <h4 class="card-title d-inline-block">All Projects</h4>
        <Add-Article class=" m-3" @ArticleAdded="getResults"></Add-Article>
        <div class="container-small mb-3">
            <!-- <input type="text" class="form-control text-center" @keyup="FindArticle" v-model="q" placeholder="Search"> -->
            <input type="text" class="form-control text-center"  v-model="q" placeholder="Search">
        </div>
        <div class="table-responsive">
            <table class="table table-borderless table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="article in Articles.filteredData.data" :key="article.id">
                        <th>{{ article.id }}</th>
                        <td>{{ article.title }}</td>
                        <td>{{ article.created_at }}</td>
                        <td>

                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DetailsModal" @click="getArticle(article)">
                                Details
                            </button>|
                           <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#EditModal" @click="getArticle(article)">
                                Modify
                            </button>|
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
                <Show-Article :article="article" ></Show-Article>
            </div>
            <div class="">
                <pagination :data="Articles.filteredData" @pagination-change-page="getResults" class="mt-5"></pagination>
            </div>
        </div>
    </div>
</div>
</template>

<script>
// we have the main root in EnvPath work using this in every file please
import Path from "../../EnvPath";

export default {

    data: function () {
        return {
            Articles: {
                originalData:{},
                filteredData:{},
            },
            article: {},
            q: ''
        }
    },

    mounted() {
        this.getResults();
    },

    methods: {
        getResults(page = 1) {
            const param = this.q ? '/' + this.q : '';

            axios.get(Path.baseUrl + 'Article' + param + '?page=' + page)
                .then(response => {
                    this.Articles.originalData = {...response.data}
                    this.Articles.filteredData  = {...response.data}
                });
        },

        getArticle(article) {
            this.article = {...article};
        },

        refresh(Articles) {
            this.Articles = {...Articles.filteredData};
        },

    },
    watch:{
        q:function(value){
                    if (value.length > 0) {
                    this.Articles.filteredData.data = this.Articles.originalData.data.filter((article)=>{

                            return article.title.toLowerCase().includes(value.toLowerCase())
                    })
                    }
                    else
                        this.Articles.filteredData = {...this.Articles.originalData}
        },
    }
}
</script>

<style>

</style>
