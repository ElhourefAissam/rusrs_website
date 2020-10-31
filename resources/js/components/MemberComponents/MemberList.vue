<template>
<div>
    <div class="container">
        <h4 class="card-title d-block alert alert-info my-2">Members of the association</h4>
        <div class="container-small mb-3">
             <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary w-100 my-2" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus-square"></i>
            </button>
            <Add-Member class="m-3" @MemberAdded="getResults"></Add-Member>
            <input type="text" class="form-control text-center" @keyup="FindMember" v-model="q" placeholder="Search">
            <pagination :data="Members" @pagination-change-page="getResults" class="mt-5"></pagination>
        </div>

        <div class="row">
            <div v-for="member in Members.data" :key="member.id" class="card col3 mx-4 mt-2" style="width: 18rem;">
                <img width="286" height="180" class="card-img-top" :src="member.photos ? member.photos.filename : '/images/unkown.jpg' " alt=""/>
                <div class="card-body">
                    <h4 class="card-title"><i class="far fa-user"></i> {{ member.full_name }}</h4>
                    <p class="ml-1"> <i class="fas fa-user-md"></i> {{member.position}}</p>
                    <a  :href="member.facebook? member.facebook: '#'" class="ml-1"> <i class="fab fa-facebook"></i> {{member.facebook? member.facebook: 'unkown facebook'}} </a>

                    <div class="card-body">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#DetailsModal"  @click="getMember(member)">
                        <i class="fas fa-info-square"></i></button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#EditModal" @click="getMember(member)">
                        <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal"  @click="getMember(member)">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-small mb-3">
             <pagination :data="Members" @pagination-change-page="getResults" class="mt-5"></pagination>
        </div>

        <Show-Member :Member="Member" ></Show-Member>
        <Edit-Member :Member="Member" @MemberUpdated="getResults"></Edit-Member>
        <Delete-Member :Member="Member" @MemberDeleted="getResults"></Delete-Member>

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
