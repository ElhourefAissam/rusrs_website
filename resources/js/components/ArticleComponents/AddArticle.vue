<template>
<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Ajouter un Article
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" name="title" v-model="title" class="form-control" placeholder="title">
                        </div>
                        <div class=" form-group">
                            <label for="artical_body">Artical_body</label>
                            <textarea rows="2" name="artical_body" v-model="artical_body" class="form-control" placeholder="Artical_body"></textarea>
                        </div>
                        <div class=" form-group">
                            <label for="author">author</label>
                            <input type="text" name="author" v-model="author" class="form-control" placeholder="author">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Ajouter" @click="AddArticle" data-dismiss="modal">
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
export default {
    data: function () {
        return {
            Articles: {},
            title: '',
            artical_body: '',
            author: '',
        }
    },
    methods: {
        AddArticle() {
            let data = new FormData();
            data.append('title', this.title);
            data.append('artical_body', this.artical_body);
            data.append('author', this.author);
            // if (document.getElementById('Image').files[0]) {
            //     data.append('Image', document.getElementById('Image').files[0]);
            // };
            axios.post('http://rusrs-website.test/api/Article/', data)
                .then((response) => {
                    this.$emit('ArticleAdded', response)
                })
                .catch(error => console.log(error));
            alert()
        }
    }
}
</script>
