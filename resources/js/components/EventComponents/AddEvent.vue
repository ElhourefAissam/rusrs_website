<template>
<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
       Add Event
    </button>

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
                            <input type="text" name="title" v-model="Event.title" class="form-control" placeholder="title">
                        </div>
                        <div class=" form-group">
                            <label for="description">Description</label>
                            <textarea rows="2" name="description" v-model="Event.description" class="form-control" placeholder="description"></textarea>
                        </div>
                        <div class=" form-group">
                            <label for="place">Place</label>
                            <input type="text" name="place" v-model="Event.place" class="form-control" placeholder="place">
                        </div>
                        <div class=" form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" v-model="Event.address" class="form-control" placeholder="address">
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
                    <input type="submit" class="btn btn-primary" @click="AddEvent"  value="add" data-dismiss="modal">
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
import {Event} from "../../Models/Models";



const url=Path.baseUrl+"Event";
const imageUrl = Path.baseUrl + "imageUpload"

export default {
    data: function () {
        return {
            Events: {},
            Event:{},
            formData: new FormData(),
            config:{}
        }
    },
    methods: {
        AddEvent() {

            // jrbgh adskrgh sin post at waaaaaloooooo
            // jrbgh adfgh event i formData atyawi s lcontroller walo

            // axios.post( url , {...this.Event})
            // .then((response) => {

            //     this.$emit('EventAdded', response)
            //     // alert('Event was added successfully')
            // })
            // .catch(error => console.log(error));
            this.formData.append("event",JSON.stringify(this.Event))
            axios.post(url , this.formData , this.config )
            .then(resp=>{
                console.log(resp)
            })
            .catch(err=>{
                console.log(err)
            })

        },

        getDateObject(data){
            this.formData = data.formData
            this.config   = data.config
        }

    }
}
</script>
