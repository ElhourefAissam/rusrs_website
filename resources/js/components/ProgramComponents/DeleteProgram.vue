<template>
<div>
    <!-- Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title alert alert-info w-100" id="DeleteModalLabel">Delete Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Do you want to remove {{Program.title}} Program</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Delete" @click="DeleteProgram" data-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Path from "../../EnvPath";

const url=Path.baseUrl + "Program";

export default {
    props: ['Program'],
    data: function () {
        return {

        }
    },
    methods: {
        DeleteProgram: function () {

            const param = this.Program.id ? '/' + this.Program.id : '';

            axios.delete(url + param)
                .then((response) => {
                    this.$emit('ProgramDeleted', response)
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
