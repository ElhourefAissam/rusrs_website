<template>
<div>
    <!-- Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title alert alert-info w-100" id="EditModalLabel">Modify Event</h5>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Modify Event</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
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
                                            <input type="text" name="address" v-model="Event.adress" class="form-control" placeholder="address">
                                        </div>
                                        <div class=" form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" name="start_date" v-model="Event.start_date" class="form-control" placeholder="start_date">
                                        </div>
                                        <div class=" form-group">
                                            <label for="end_date">End Date</label>
                                            <input type="date" name="end_date" v-model="Event.end_date" class="form-control" placeholder="end_date">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Modifie" @click="UpdateEvent" data-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Path from "../../EnvPath";

const url=Path.baseUrl+"Event/";


export default {
    props: ['Event'],
    data: function () {
        return {

        }
    },
    methods: {
        UpdateEvent: function () {
            // if (document.getElementById('Image').files[0]) {
            //     data.append('Image', document.getElementById('Image').files[0]);
            // }
            axios.put(url + this.Event.id, {...this.Event})
                .then((response) => {
                    this.$emit('EventUpdated', response)
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
