<template>
<div class="Members" color="grey">
    <notification :notification="notification" />
    <v-container class="my-5 ">
        <h1 class="display2 grey--text">أعضاء الجمعية</h1>
           <v-row justify="space-between">
                <v-col cols="12" md="5" sm="6">
                    <v-text-field
                        color="primary darken-2"
                        label="إبحث عن عضو في الجمعية"
                        @keyup="findMember"
                        v-model="q"
                        hide-details="auto"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="4" sm="6">
                    <addMember @memberAdded="memberAdded"></addMember>
                </v-col>
            </v-row>

           <div v-if="members.data.length >0" >
            <v-row>
             <v-col v-for="member in members.data" :key="member.id" col="12" md="4">
                <v-card
                    class="mx-auto"
                    max-width="344"
                >
                    <v-img style="z-index:1"
                    :src="require('../../../src/assets/team2.jpeg')"
                    height="200px"
                    >
                    <v-avatar size="120" class="mt-4 mr-3">
                    <img style="z-index:3"
                        alt="user"
                        src="https://cdn.pixabay.com/photo/2020/06/24/19/12/cabbage-5337431_1280.jpg"
                    >
                    </v-avatar>
                    </v-img>

                    <v-card-title>
                    {{member.full_name}}
                    </v-card-title>

                    <v-card-subtitle>
                    {{member.position}}
                    </v-card-subtitle>
                    <v-card-subtitle>
                    {{member.facebook}}
                    </v-card-subtitle>

                    <v-card-actions>
                     <v-row cols="12"  no-gutters>
                        <editMember   @memberUpdated="memberUpdated" :Member="member"/>
                        <deleteMember @memberDeleted="memberDeleted" :Member="member"/>
                     </v-row>
                    </v-card-actions>
                </v-card>
             </v-col>
            </v-row>
           </div>
            <div v-else>
                <v-row justify="center">
                 <v-card
                    class="mx-auto text-center pa-4"
                    width="100%"

                >
                    لا يوجد أعضاء
                </v-card>
                </v-row>
            </div>
        <div class="container-small mb-3">
            <pagination :data="members" @pagination-change-page="members" class="mt-5"></pagination>
        </div>
    </v-container>
</div>
</template>

<script>
import {notification, notify} from "../../../Models/Models";
import memberService from "../../../Services/MemberService";

import addMember from "./AddMember"
import deleteMember from "./DeleteMember"
import editMember   from "./EditMember"

export default {
    components: {
        addMember,
        deleteMember,
        editMember,

    },
    data: function () {
        return {
            members:{data:[]},
            q: '',
            notification,
        };
    },
    mounted(){
        this.getResults()
    },
    methods: {

         async getResults(){ this.members = await memberService.listOfMembers(this.q)  }

        ,findMember(){ this.getResults()}

        ,memberAdded(isAdded=false){ isAdded ? this.sendNofitication() : this.sendErrorNotification()}

        ,memberUpdated(isUpdated){ isUpdated ? this.sendNofitication() : this.sendErrorNotification()}

        ,memberDeleted(isDeleted){ isDeleted? this.sendNofitication() : this.sendErrorNotification()}

        ,sendNofitication(){
                this.getResults()
                this.notification={...notify("لقد تم بنجاح","orange")}
        }

        ,sendErrorNotification(){ this.notification={...notify("لم يتم بنجاح !","error")} }

    },
    filters: {
         subStr     : (string) => string ? string.substring(0, 80) + '...' : ''
        ,adjustDate : (date)   => date? date.substring(0, 10):'لا يوجد تاريخ'
    }
}
</script>
