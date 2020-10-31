<template>
<div>
    <div class="card-body">
        <h4 class="card-title d-block alert alert-info my-2">List of Association events</h4>
        <Add-Event class=" m-3" @EventAdded="getResults"></Add-Event>
        <div class="container-small mb-3">
             <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary w-100 my-2" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus-square"></i>
            </button>
            <input type="text" class="form-control text-center" @keyup="FindEvent" v-model="q" placeholder="Search">
            <pagination :data="Events" @pagination-change-page="getResults" class="mt-5"></pagination>
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
                        <th>Created at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="Event in Events.data" :key="Event.id">
                        <th>{{ Event.id }}</th>
                        <td>{{ Event.title | subStr }}</td>
                        <td>{{ Event.place | subStr }}</td>
                        <td>{{ Event.description | subStr }}</td>
                        <td>{{ Event.start_date }}</td>
                        <td>{{ Event.end_date }}</td>
                        <td>{{ Event.address | subStr }}</td>
                        <td>{{ Event.created_at }}</td>
                        <td class="btns">

                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DetailsModal" @click="getArticle(article)">
                            <i class="fas fa-info-square"></i>
                        </button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#EditModal" @click="getArticle(article)">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal" @click="getArticle(article)">
                            <i class="far fa-trash-alt"></i>
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
            <div class="container-small mb-3">
                <pagination :data="Events" @pagination-change-page="getResults" class="mt-5"></pagination>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Path from "../../EnvPath";

const url = Path.baseUrl + "Event/";


export default {
    data: function () {
        return {
            Events: {},
            Event:{},
            q: ''
        }
    },
    mounted() {
        this.getResults();
    },
    methods: {

        getResults(page = 1) {

            axios.get(url + this.q + '?page=' + page)
                .then(response => {
                    console.log(response.data)
                    this.Events = response.data;
                });
        },

        getEvent(Event) {
            this.Event = {
                ...Event
            };
        },

        FindEvent() {

            if (this.q.length > 0) {

            axios.get(url + this.q)
                    .then(response => {
                        this.Events = response.data;
                    });

            } else this.getResults();
        },
    },
    filters: {

  	subStr: function(string) {
    	return string.substring(0,15) + '...';
        }

  }
}
</script>
<style scoped>

</style>
