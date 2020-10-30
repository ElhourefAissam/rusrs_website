<template>
<div>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="DetailsModal" tabindex="-1" aria-labelledby="DetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title alert alert-info w-100" id="DetailsModalLabel">Member Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                <div class="slideshow-container">
                                       <img class="silder-image" :src="Member.photos.filename">
                                </div>
                                </div>
                                <div class="modal-body">
                                    <h1>{{Member.full_name}}</h1>
                                    <h1>{{Member.position}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

>

<script>
import Path from "../../EnvPath";

const url = Path.baseUrl + "Member";

export default {
    props: ['Member'],
    data: function () {
        return {

        }
    },
    computed: {

    }
}
</script>>
