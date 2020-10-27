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
                    <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <form>
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
                            <label for="address">address</label>
                            <input type="text" name="address" v-model="Event.adress" class="form-control" addressholder="address">
                        </div>
                        <div class=" form-group">
                            <label for="start_date">Starting at</label>
                            <input type="date" name="start_date" v-model="Event.start_date" class="form-control" placeholder="start_date">
                        </div>
                         <div class=" form-group">
                            <label for="end_date">Ending at</label>
                            <input type="date" name="end_date" v-model="Event.end_date" class="form-control" placeholder="end_date">
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

const url=Path.baseUrl+"Event";

export default {
    data: function () {
        return {
            Events: {},
            Event:{

            }
        }
    },
    methods: {
        AddArticle() {
            axios.post( url, {...this.Event})
                .then((response) => {
                    this.$emit('EventAdded', response)
                    alert('Event was added successfully')
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
