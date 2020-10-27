<template>
<div>
<<<<<<< HEAD
    <div class="modal fade" id="ShowModal" tabindex="-1" aria-labelledby="ShowModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ShowModalLabel">
                        Modifie information d'article
                    </h5>
=======
    <div>
    <!-- Modal -->
    <div class="modal fade" id="DetailsModal" tabindex="-1" aria-labelledby="DetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DetailsModalLabel">Modifie information d'article</h5>
>>>>>>> 5013c63de498960a60b66668da10dcbc7c0e9dab
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
<<<<<<< HEAD
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fas fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <input type="submit" class="btn btn-primary" value="Modifie" @click="UpdateArticle" data-dismiss="modal" />
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="portfolio-hover">
        <div class="portfolio-hover-content">
            <i class="fas fa-plus fa-3x"></i>
        </div>
    </div>
    <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt="" /> -->
=======
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">

                            </div>
                            <div class="modal-body">
                                    <h1>{{article.title}}</h1>
                                    <h1>{{article.artical_body}}</h1>
                                    <h1>{{article.author}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
>>>>>>> 5013c63de498960a60b66668da10dcbc7c0e9dab
</div>
</template>

>

<script>
import Path from "../../EnvPath";

const url=Path.baseUrl+"Article";

export default {
    props: ["article"],
    data: function () {
        return {};
    },
    computed: {},
};
</script>>
