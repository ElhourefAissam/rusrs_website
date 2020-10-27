<template>
<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
       Add Article
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <form>
                        <div class=" form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" v-model="Article.title" class="form-control" placeholder="title">
                        </div>
                        <div class=" form-group">
                            <label for="artical_body">Artical_body</label>
                            <textarea rows="2" name="artical_body" v-model="Article.artical_body" class="form-control" placeholder="Article body"></textarea>
                        </div>
                        <div class=" form-group">
                            <label for="author">author</label>
                            <input type="text" name="author" v-model="Article.author" class="form-control" placeholder="author">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" @click="AddArticle" value="add" data-dismiss="modal">
                </div>
            </div>
        </div>
        <!-- <div v-if="imagepreview" class="mt-3"> -->
        <!-- <img :src="imagepreview" class="figure-img img-fluid rounded" style="max-height:100px;"> -->
        <!-- </div> -->
    </div>
</div>
</template>

<script>

// we have the main root in EnvPath work using this in every file please
import Path from "../../EnvPath";
import {Article} from "../../Models/Models";

const url=Path.baseUrl+"Article";

export default {
    data: function () {
        return {
            Articles: {},
            Article
        }
    },
    methods: {
        AddArticle() {
            axios.post( url, {...this.Article})
                .then((response) => {
                    this.$emit('ArticleAdded', response)
                    alert('article added')
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
