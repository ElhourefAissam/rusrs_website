<template>
<div>
    <!-- Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteModalLabel">Supprimer un Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Do you want to remove Member : {{Member.full_name}}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Suprrimer" @click="DeleteMember" data-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Path from "../../EnvPath";

const url=Path.baseUrl+"Member/";

export default {
    props: ['Member'],
    data: function () {
        return {

        }
    },
    methods: {
        DeleteMember: function () {

            axios.delete(url + this.Member.id)
                .then((response) => {
                    this.$emit('MemberDeleted', response)
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
