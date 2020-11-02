<template>
<div class="Members" color="grey">
     <v-container class="my-5 ">
        <h1 class="display2 grey--text">أعضاء الجمعية</h1>
           <v-row justify="space-between">
                <v-col cols="12" md="5" sm="6">
                    <v-text-field
                        color="primary darken-2"
                        label="إبحث عن عضو في الجمعية"
                        @change="FindMember"
                        v-model="q"
                        hide-details="auto"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="4" sm="6">
                    <addMember></addMember>
                </v-col>
            </v-row>

            <v-row>
             <v-col v-for="Member in Members.data" :key="Member.id" col="12" md="4">
                    <v-card
                    class="mx-auto"
                    max-width="344"
                >
                    <v-img style="z-index:1"
                    src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                    height="200px"
                    >
                    <!-- <v-avatar size="56">
                    <img style="z-index:3"
                        alt="user"
                        src="https://cdn.pixabay.com/photo/2020/06/24/19/12/cabbage-5337431_1280.jpg"
                    >
                    </v-avatar> -->
                    </v-img>

                    <v-card-title>
                    {{Member.full_name}}
                    </v-card-title>

                    <v-card-subtitle>
                    {{Member.position}}
                    </v-card-subtitle>
                    <v-card-subtitle>
                    {{Member.facebook}}
                    </v-card-subtitle>

                    <v-card-actions>
                     <v-row cols="12"  no-gutters>
                        <editMember    :Member="Member"/>
                        <deleteMember  :Member="Member"/>
                     </v-row>
                    </v-card-actions>
                </v-card>
             </v-col>
            </v-row>
        <div class="container-small mb-3">
            <pagination :data="Members" @pagination-change-page="getResults" class="mt-5"></pagination>
        </div>
     </v-container>
</div>
</template>

<script>
import Path from "../../EnvPath";
import {Member} from "../../Models/Models";

import addMember    from "./AddMember"
import deleteMember from "./DeleteMember"
import editMember   from "./EditMember"

const url = Path.baseUrl + "Member/";


export default {
    components:{
        addMember,
        deleteMember,
        editMember,
    },
    data: function () {
        return {
            Members: {},
            Member,
            q: '',
            show:false
        }
    },
    created() {
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
