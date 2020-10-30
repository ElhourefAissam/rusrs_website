<template>
<div>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="DetailsModal" tabindex="-1" aria-labelledby="DetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title alert alert-info w-100" id="DetailsModalLabel">Modifie information d'article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3>{{article.title}}</h3>
                                </div>
                                <div class="slideshow-container">
                                    <div v-for="photo in article.photos" :key="photo.id" class="mySlides fade-slider">
                                        <div class="numbertext">1 / 3</div>
                                        <img class="silder-image" :src="photo.filename">
                                        <div class="text">London, Ebgland</div>
                                    </div>
                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                </div>
                                <div class="modal-body">
                                    <p>{{article.article_body }}</p>
                                </div>
                            </div>
                        </div>
                        <h6>{{article.author}}</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

>

<script>
import Path from "../../EnvPath";

const url = Path.baseUrl + "Article";

export default {
    props: ["article"],
    data: function () {
        return {};
    },
    computed: {},
};
</script>>
