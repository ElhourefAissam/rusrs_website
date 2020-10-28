<template>
<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
       Add Program
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="d-block alert alert-info w-100" id="exampleModalLabel">Add Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <form>
                        <!-- {{Form::token()}} -->
                        <div class=" form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" v-model="Program.title" class="form-control" placeholder="title of your program">
                        </div>
                        <div class=" form-group">
                            <label for="link">link</label>
                            <textarea rows="2" name="link" v-model="Program.link" class="form-control" placeholder="youtube video link"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" @click="AddProgram" value="add" data-dismiss="modal">
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
import {Program} from "../../Models/Models";

const url=Path.baseUrl+"Program";

export default {
    data: function () {
        return {
            Programs: {},
            Program
        }
    },
    methods: {
        AddProgram() {
            axios.post( url, {...this.Program})
                .then((response) => {
                    this.$emit('ProgramAdded', response)
                    alert('Program was added successfully')
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
