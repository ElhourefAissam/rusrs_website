<template>
<section class="page-section bg-light" id="portfolio">

    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Portfolio</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="container-small mb-3">
            <input type="text" class="form-control text-center" @keyup="FindArticle" v-model="q" placeholder="Recherche">
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4" v-for="article in Articles.data" :key="article.id">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">{{article.title}}</div>
                        <div class="portfolio-caption-subheading text-muted">{{ article.author }}</div>
                    </div>
                </div>
            </div>
            <div class="">
                <pagination :data="Articles" @pagination-change-page="getResults" class="mt-5"></pagination>
            </div>
        </div>
    </div>
</section>
</template>

<script>
export default {
    data: function () {
        return {
            Articles: {},
            article: {},
            q: ''
        }
    },
    mounted() {
        this.getResults();
    },
    methods: {
        getResults(page = 1) {
            axios.get('http://rusrs-website.test/api/Article/' + this.q + '?page=' + page)
                .then(response => {
                    console.log(response.data);
                    this.Articles = response.data;
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
