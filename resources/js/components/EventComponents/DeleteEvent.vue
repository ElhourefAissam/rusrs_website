<template>
<div>
    <!-- Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title alert alert-info w-100" id="DeleteModalLabel">Delete Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Do you want to remove {{Event.title}} Event</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Suprrimer" @click="DeleteEvent" data-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Path from "../../EnvPath";

const url=Path.baseUrl + "Event";

export default {
    props: ['Event'],
    data: function () {
        return {

        }
    },
    methods: {
        DeleteEvent: function () {

            const param = this.Event.id ? '/' + this.Event.id : '';

            axios.delete(url + param)
                .then((response) => {
                    this.$emit('EventDeleted', response)
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
