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
                    <h5 class="modal-title alert alert-info w-100" id="exampleModalLabel">Add Article</h5>
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
                            <label for="article_body ">article body </label>
                            <textarea rows="2" name="artical_body" v-model="Article.article_body " class="form-control" placeholder="article body"></textarea>
                        </div>
                        <div class=" form-group">
                            <label for="author">author</label>
                            <input type="text" name="author" v-model="Article.author" class="form-control" placeholder="author">
                        </div>
                            <image-uploader  @imageUploaded="getDateObject"/>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" @click="AddArticle" value="add" data-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

// we have the main root in EnvPath work using this in every file please
import Path from "../../EnvPath";
import {Article, UploadImagesModel} from "../../Models/Models";

const url = Path.baseUrl + "Article";

export default {
    data: function () {
        return {
            Articles: {},
            Article,
            UploadImagesModel
        }
    },
    methods: {
        AddArticle() {
            axios.post( url, this.Article)
                .then((response) => {
                    console.log(response)

                    if(response.data.id){
                    this.UploadImagesModel.formData.append("modelId",response.data.id)
                    this.addImages()
               }
            })
            .catch(error => console.log(error));
        },

        getDateObject(data){
            this.UploadImagesModel.formData = data.formData
            this.UploadImagesModel.config = data.config
        },

        addImages(){
            axios.post(url , this.UploadImagesModel.formData , this.UploadImagesModel.config )
            .then(response=>{
                this.$emit('ArticleAdded', response)
                alert('Article was added successfully')
            })
            .catch(err=>{
                console.log(err)
            })
        }
    }
}
</script>
