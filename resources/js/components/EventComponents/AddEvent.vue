<template>
<div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="d-block alert alert-info w-100" id="exampleModalLabel">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <form>
                        <!-- {{Form::token()}} -->
                        <div class=" form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title"  v-model="Event.title" class="form-control" placeholder="title">
                        </div>
                        <div class=" form-group">
                            <label for="description">Description</label>
                            <textarea rows="2" name="description"   v-model="Event.description" class="form-control" placeholder="description"></textarea>
                        </div>
                        <div class=" form-group">
                            <label for="place">Place</label>
                            <input type="text" name="place" v-model="Event.place"   class="form-control" placeholder="place">
                        </div>
                        <div class=" form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" v-model="Event.address"  class="form-control" placeholder="address">
                        </div>
                        <div class=" form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" v-model="Event.start_date" class="form-control" placeholder="starting date">
                        </div>
                        <div class=" form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" v-model="Event.end_date" class="form-control" placeholder="ending date">
                        </div>
                         <div class=" form-group">
                            <!-- image ulpoader component -->
                        </div>
                        <image-uploader  @imageUploaded="getDateObject"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" @click="AddEvent"  data-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

// we have the main root in EnvPath work using this in every file please
import Path from "../../EnvPath";
import axios from "axios";
import {Event , UploadImagesModel} from "../../Models/Models";



const url=Path.baseUrl+"Event";
const imageUrl = Path.baseUrl + "imageUpload"

export default {
    data: function () {
        return {
            Events: {},
            Event,
            UploadImagesModel
        }
    },
    methods: {
        async AddEvent() {

           axios.post( url , this.Event)
           .then(response=>{
               if(response.data.id){
                   this.UploadImagesModel.formData.append("modelId",response.data.id)
                   this.addImages()
               }

           }).catch(err=>{
                console.log(err)
            })
        },

        getDateObject(data){
            this.UploadImagesModel.formData = data.formData
            this.UploadImagesModel.config = data.config
        },

        addImages(){
            axios.post(url , this.UploadImagesModel.formData , this.UploadImagesModel.config )
            .then(response=>{
                this.$emit('EventAdded', response)
                alert('Event was added successfully')
            })
            .catch(err=>{
                console.log(err)
            })
        }

    }
}
</script>
