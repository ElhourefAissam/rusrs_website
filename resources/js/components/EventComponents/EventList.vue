<template>
<div>
    <div class="card-body">
        <div class="dropdown float-right position-relative">
            <a href="#" class="dropdown-toggle h4 text-muted" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#" class="dropdown-item">Action</a></li>
                <li><a href="#" class="dropdown-item">Another action</a></li>
                <li><a href="#" class="dropdown-item">Something else here</a></li>
                <li class="dropdown-divider"></li>
                <li><a href="#" class="dropdown-item">Separated link</a></li>
            </ul>
        </div>
        <h4 class="card-title d-inline-block">All Projects</h4>
        <Add-Event class=" m-3" @EventAdded="getResults"></Add-Event>
        <div class="container-small mb-3">
            <!-- <input type="text" class="form-control text-center" @keyup="FindEvent" v-model="q" placeholder="Search"> -->
            <input type="text" class="form-control text-center"  v-model="q" placeholder="Search">
        </div>
        <div class="table-responsive">
            <table class="table table-borderless table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Place</th>
                        <th>Desciption</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Address</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="Event in Events.filteredData.data" :key="Event.id">
                        <th>{{ Event.id }}</th>
                        <td>{{ Event.title }}</td>
                        <td>{{ Event.created_at }}</td>
                        <td>

                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DetailsModal" @click="getEvent(Event)">
                                Details
                            </button>|
                           <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#EditModal" @click="getEvent(Event)">
                                Modify
                            </button>|
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal" @click="getEvent(Event)">
                                delete
                            </button>
                       </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <Edit-Event :Event="Event" @EventUpdated="getResults"></Edit-Event>
                <Delete-Event :Event="Event" @EventDeleted="getResults"></Delete-Event>
                <Show-Event :Event="Event" ></Show-Event>
            </div>
            <div class="">
                <pagination :data="Events.filteredData" @pagination-change-page="getResults" class="mt-5"></pagination>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Path from "../../EnvPath";

const url = Path.baseUrl + "Event";


export default {
    data: function () {
        return {
            Events: {},
            Event: {

            },
            q: ''
        }
    },
    mounted() {
        this.getResults();
    },
    methods: {
        getResults(page = 1) {
            axios.get( url + this.q + '?page=' + page)
                .then(response => {
                    this.Event = response.data;
            });
        },
        getEvent(Event) {
            this.Event = Event;
        },
        refresh(Events) {
            this.Events = Events.data;
        },
        FindEvent() {
            if (this.q.length > 0) {
                axios.get(url + this.q)
                    .then(response => {
                        this.Events = response.data;
                    });
            } else
                this.getResults();
        }
    }
}
</script>
