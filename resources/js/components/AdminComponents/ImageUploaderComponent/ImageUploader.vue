<template>
    <div>
        <div class="custom-file">
            <input @change="imageSelected" ref="files" multiple type="file" accept="image/gif, image/jpeg, image/png, image/svg, image/jpg" class="custom-file-input" id="customFile" />
            <label class="custom-file-label" for="customFile">Choose an image</label>
        </div>
        <div>
            <img v-if="imagesList" :src="images"  class="uploaded-image figure-img img-fluid my-3" alt="image not found">
            <img v-for="(image,index) in imagesPreview" :key="index"  :src="image"  class="uploaded-image figure-img img-fluid my-3" alt="image not found">
        </div>

        <button type="button" class="btn btn-success my-4" @click="uploadImages">Upload</button>
    </div>
</template>

<script>
import Path from "../../../EnvPath";
const url = Path.baseUrl + "imageUpload/"

export default {

    props:["imagesList"],

    data(){
        return {
            images:[],
            imagesPreview:[]
        }
    },
    methods:{

        imageSelected(e){
            this.images = Object.values(e.target.files)
            this.images.map(image=>{
                let reader = new FileReader()
                reader.readAsDataURL(image)
                reader.onload= e =>{
                    this.imagesPreview.push(e.target.result)
                }
            })
        },

        uploadImages(){
            const data={
                formData:new FormData(),
                config:{},
            }
            let formData = new FormData()
            let self=this
            for(let i=0; i<self.images.length;i++){
                let file = self.images[i]
                formData.append("files["+ i + "]" , self.images[i])
            }

            const config ={
                headers:{"content-type":"undefined"}
            }

            data.formData=formData
            data.config=config

            this.$emit("imageUploaded",data)

            this.imagesPreview=[]
        }
    }

}
</script>

<style scoped>
.uploaded-image{
 max-height:100px;
 padding:5px;
 border-radius: 10px;
 margin-right: 2px;
 box-shadow: 0 5px 5px rgb(0, 0, 0,0.2);
}
</style>
