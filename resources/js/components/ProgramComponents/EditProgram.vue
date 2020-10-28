<template>
<div>
    <!-- Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title alert alert-info w-100" id="EditModalLabel">Modify Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                    <input type="submit" class="btn btn-primary" value="Modify" @click="UpdateProgram" data-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Path from "../../EnvPath";

const url = Path.baseUrl + "Program/";


export default {
    props: ['Program'],
    data: function () {
        return {

        }
    },
    methods: {
        UpdateProgram: function () {

            axios.put(url + this.Program.id, {...this.Program})
                .then((response) => {
                    this.$emit('ProgramUpdated', response)
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
