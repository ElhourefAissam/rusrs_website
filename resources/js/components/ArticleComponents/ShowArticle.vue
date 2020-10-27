<template>
<div>
    <div class="modal fade" id="ShowModal" tabindex="-1" aria-labelledby="ShowModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ShowModalLabel">
                        Modifie information d'article
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
</div>
</template>

>

<script>
export default {
    props: ["article"],
    data: function () {
        return {};
    },
    computed: {},
};
</script>>
