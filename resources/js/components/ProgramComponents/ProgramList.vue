<template>
<div>
    <div class="card-body">

        <h4 class="card-title d-block alert alert-info my-2">List of Association Programs</h4>
        <Add-Program class=" m-3" @ProgramAdded="getResults"></Add-Program>
        <div class="container-small mb-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary w-100 my-2" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus-square"></i>
            </button>
            <input type="text" class="form-control text-center" @keyup="FindProgram" v-model="q" placeholder="Search">
            <pagination :data="Programs" @pagination-change-page="getResults" class="my-3"></pagination>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="program in Programs.data" :key="program.id">
                        <th>{{ program.id }}</th>
                        <td>{{ program.title }}</td>
                        <td>{{ program.link }}</td>
                        <td>{{ program.created_at }}</td>
                        <td class="btns">

                         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DetailsModal" @click="getProgram(program)">
                            <i class="fas fa-info-square"></i>
                        </button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#EditModal" @click="getProgram(program)">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal" @click="getProgram(program)">
                            <i class="far fa-trash-alt"></i>
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
            <div class="container-small mb-3">
                <pagination :data="Programs" @pagination-change-page="getResults" class="mt-5"></pagination>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Path from "../../EnvPath";
import {Program} from "../../Models/Models"

const url = Path.baseUrl + "Program/";


export default {
    data: function () {
        return {
            Programs: {},
            Program,
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

        getProgram(program) {
            this.Program = {
                ...program
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
