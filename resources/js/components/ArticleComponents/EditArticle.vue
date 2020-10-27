<template>
<div>
    <!-- Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title alert alert-info w-100" id="EditModalLabel">Modifie information d'article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <!-- {{Form::token()}} -->
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un Article</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <!-- {{Form::token()}} -->
                                        <div class=" form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" v-model="article.title" class="form-control" placeholder="title">
                                        </div>
                                        <div class=" form-group">
                                            <label for="artical_body">Artical_body</label>
                                            <textarea rows="2" name="artical_body" v-model="article.artical_body" class="form-control" placeholder="Artical_body"></textarea>
                                        </div>
                                        <div class=" form-group">
                                            <label for="author">author</label>
                                            <input type="text" name="author" v-model="article.author" class="form-control" placeholder="author">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Modifie" @click="UpdateArticle" data-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Path from "../../EnvPath";


const url=Path.baseUrl+"Article/";


export default {
    props: ['article'],
    data: function () {
        return {

        }
    },
    methods: {
        UpdateArticle: function () {
            // if (document.getElementById('Image').files[0]) {
            //     data.append('Image', document.getElementById('Image').files[0]);
            // }
            axios.put(url + this.article.id, {...this.article})
                .then((response) => {
                    this.$emit('ArticleUpdated', response)
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
