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
        <Add-Member class="m-3" @MemberAdded="getResults"></Add-Member>
        <div class="container-small mb-3">
            <input type="text" class="form-control text-center" @keyup="FindMember" v-model="q" placeholder="Search">
        </div>
        <div class="table-responsive">
            <table class="table table-borderless table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Position</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="Member in Members.data" :key="Member.id">
                        <th>{{ Member.id }}</th>
                        <td>{{ Member.full_name }}</td>
                        <td>{{ Member.position }}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DetailsModal"  @click="getMember(Member)">
                                Details
                            </button>|
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#EditModal" @click="getMember(Member)">
                                Modify
                            </button>|
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal"  @click="getMember(Member)">
                                delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <Show-Member :Member="Member" ></Show-Member>
                <Edit-Member :Member="Member" @MemberUpdated="getResults"></Edit-Member>
                <Delete-Member :Member="Member" @MemberDeleted="getResults"></Delete-Member>
            </div>
            <div class="">
                <pagination :data="Members" @pagination-change-page="getResults" class="mt-5"></pagination>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Path from "../../EnvPath";

const url = Path.baseUrl + "Member";


export default {
    data: function () {
        return {
            Members: {},
            Member: {},
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
                    this.Member = response.data;
                });
        },
        getMember(Member) {
            this.Member = Member;
        },
        refresh(Members) {
            this.Members = Members.data;
        },
        FindMember() {
            if (this.q.length > 0) {
                axios.get(url + this.q)
                    .then(response => {
                        this.Members = response.data;
                    });
            } else
                this.getResults();
        }
    }
}
</script>
