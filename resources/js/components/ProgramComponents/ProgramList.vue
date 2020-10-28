<template>
<div>
    <div class="card-body">
        <div class="dropdown float-right position-relative">

        </div>
        <h4 class="card-title d-block alert alert-info my-2">List of Association Programs</h4>
        <Add-Program class=" m-3" @ProgramAdded="getResults"></Add-Program>
        <div class="container-small mb-3">
            <input type="text" class="form-control text-center" @keyup="FindProgram" v-model="q" placeholder="Search">
        </div>
        <div class="table-responsive">
            <table class="table table-borderless table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="Program in Programs.data" :key="Program.id">
                        <th>{{ Program.id }}</th>
                        <td>{{ Program.title }}</td>
                        <td>{{ Program.link }}</td>
                        <td>{{ Program.created_at }}</td>
                        <td>

                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DetailsModal" @click="getProgram(Program)">
                                Details
                            </button>
                           <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#EditModal" @click="getProgram(Program)">
                                Modify
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal" @click="getProgram(Program)">
                                Delete
                            </button>
                       </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <Edit-Program :Program="Program" @ProgramUpdated="getResults"></Edit-Program>
                <Delete-Program :Program="Program" @ProgramDeleted="getResults"></Delete-Program>
                <Show-Program :Program="Program" ></Show-Program>
            </div>
            <div class="">
                <pagination :data="Programs" @pagination-change-page="getResults" class="mt-5"></pagination>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Path from "../../EnvPath";

const url = Path.baseUrl + "Program";


export default {
    data: function () {
        return {
            Programs: {},
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

                    this.Programs = response.data;
                });
        },

        getProgram(Program) {
            this.Program = {
                ...Program
            };
        },

        refresh(Programs) {
            this.Programs = {
                ...Programs.filteredData
            };
        },
        FindProgram() {
            if (this.q.length > 0) {
                axios.get(url + this.q)
                    .then(response => {

                        this.Programs = response.data;
                    });
            } else this.getResults();
        },

    }
}
</script>
