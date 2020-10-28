<template>
<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
       Add Member
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title alert alert-info w-100" id="exampleModalLabel">Add Member information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <form>
                        <!-- display an image here -->

                        <div class=" form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" name="full_name" v-model="Member.full_name" class="form-control" placeholder="full name">
                        </div>
                         <div class=" form-group">
                            <label for="facebook">Facebook link</label>
                            <input name="facebook" v-model="Member.facebook" class="form-control" placeholder="facebook"/>
                        </div>
                        <div class=" form-group">
                            <label for="position">Position</label>
                            <input name="position" v-model="Member.position" class="form-control" placeholder="position"/>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" @click="AddMember" value="add" data-dismiss="modal">
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
import {Member} from "../../Models/Models"

const url=Path.baseUrl+"Member";

export default {
    data: function () {
        return {
            Members: {},
            Member
        }
    },
    methods: {
        AddMember() {
            axios.post( url, {...this.Member})
                .then((response) => {
                    this.$emit('MemberAdded', response)
                    alert('Member added')
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
