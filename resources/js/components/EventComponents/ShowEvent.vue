<template>
<div>
    <div>
    <!-- Modal -->
    <div class="modal fade" id="DetailsModal" tabindex="-1" aria-labelledby="DetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DetailsModalLabel">Event Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body">
                                    <h4>{{Event.title}}</h4>
                                    <h4>{{Event.desctiption}}</h4>
                                    <h4>{{Event.place}}</h4>
                                    <h4>{{Event.adress}}</h4>
                                    <h4>{{Event.start_date}}</h4>
                                    <h4>{{Event.end_date}}</h4>
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

const url= Path.baseUrl + "Event";

export default {
    props: ['Event'],
    data: function () {
        return {

        }
    },
    computed: {

    }
}
</script>>
