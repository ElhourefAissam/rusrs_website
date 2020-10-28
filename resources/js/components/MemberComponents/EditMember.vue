<template>
<div>
    <!-- Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title alert alert-info w-100" id="EditModalLabel">Modify Member</h5>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Modify a member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <!-- {{Form::token()}} -->
                                        <div class=" form-group">
                                            <label for="full_name">Full name</label>
                                            <input type="text" name="full_name" v-model="Member.full_name" class="form-control" placeholder="full name">
                                        </div>
                                         <div class=" form-group">
                                            <label for="facebook">Facebook link</label>
                                            <input type="text" name="facebook" v-model="Member.facebook" class="form-control" placeholder="facebook link">
                                        </div>
                                        <div class=" form-group">
                                            <label for="position">Position</label>
                                            <textarea rows="2" name="position" v-model="Member.position" class="form-control" placeholder="position"></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Modifie" @click="UpdateMember" data-dismiss="modal">
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
        UpdateMember: function () {
            // if (document.getElementById('Image').files[0]) {
            //     data.append('Image', document.getElementById('Image').files[0]);
            // }
            axios.put(url + this.Member.id, {...this.Member})
                .then((response) => {
                    this.$emit('MemberUpdated', response)
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
