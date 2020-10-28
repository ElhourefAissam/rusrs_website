<template>
<div>
    <div class="card-body">
        <div class="dropdown float-right position-relative">

        </div>
        <h4 class="card-title d-block alert alert-info my-2">Members of the association</h4>
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
                        <th>Facebook</th>
                        <th>Position</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="member in Members.data" :key="member.id">
                        <td>{{ member.id }}</td>
                        <td>{{ member.full_name }}</td>
                        <td>{{ member.facebook }}</td>
                        <td>{{ member.position }}</td>
                        <td class="btns">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DetailsModal"  @click="getMember(member)">
                                Details
                            </button>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#EditModal" @click="getMember(member)">
                                Modify
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal"  @click="getMember(member)">
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
import {Member} from "../../Models/Models";

const url = Path.baseUrl + "Member/";


export default {
    data: function () {
        return {
            Members: {},
            Member,
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
                    console.log(response)
                     this.Members = response.data
                })
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
