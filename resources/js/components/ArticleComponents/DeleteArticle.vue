<template>
<div>
    <!-- Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteModalLabel">Supprimer un Article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Est que vous voulez Supprimer cette Article : {{article.title}}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Suprrimer" @click="DeleteArticle" data-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['article'],
    data: function () {
        return {

        }
    },
    methods: {
        DeleteArticle: function () {
            axios.delete('http://rusrs-website.test/api/Article/' + this.article.id)
                .then((response) => {
                    this.$emit('ArticleDeleted', response)
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
