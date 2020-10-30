<template>
<div>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="DetailsModal" tabindex="-1" aria-labelledby="DetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title alert alert-info w-100" id="DetailsModalLabel">Event Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>{{Event.title}}</h4>
                                </div>

                                <div class="slideshow-container">
                                    <div v-for="photo in Event.photos" :key="photo.id" class="mySlides fade-slider">
                                        <div class="numbertext">1 / 3</div>
                                        <img class="silder-image" :src="photo.filename">
                                        <div class="text">London, Ebgland</div>
                                    </div>
                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                </div>
                                 <div>
                                    <h4>{{Event.desctiption}}</h4>
                                    <h5>{{Event.place}}</h5>
                                    <h5>{{Event.adress}}</h5>
                                    <h5>{{Event.start_date}}</h5>
                                    <h5>{{Event.end_date}}</h5>
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

const url = Path.baseUrl + "Event";

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
