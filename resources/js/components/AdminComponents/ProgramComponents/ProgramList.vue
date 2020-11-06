<template>
<div class="Programs" color="grey">
    <notification :notification="notification"/>
     <v-container class="my-5 ">
        <h1 class="display2 grey--text">البرامج</h1>
           <v-row justify="space-between">
                <v-col cols="12" md="5" sm="6">
                    <v-text-field
                        color="primary darken-2"
                        label="ابحث عن برنامج"
                        @keyup="findProgram"
                        v-model="q"
                        hide-details="auto"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="4" sm="6">
                    <addProgram @programAdded="programAdded"></addProgram>
                </v-col>
                <v-col cols="12" md="4" sm="2">

                </v-col>
            </v-row>
          </v-card>
         <div v-if="programs.data.length >0" >
            <v-card v-for="program in programs.data" :key="program.id" flat class="pa-3">
                <v-row>
                    <v-col cols="12" md="4" sm="2">
                        <div>{{program.title}}</div>
                    </v-col>
                    <v-col cols="12" md="4" sm="2">
                        <div>{{ program.link}}</div>
                    </v-col>
                    <v-col cols="12" md="4" sm="2">
                        <v-row cols="12"  no-gutters>
                            <showProgram    :Program="program"/>
                            <editProgram   @programUpdated="programUpdated"  :Program="program"/>
                            <deleteProgram @programDeleted="programDeleted"  :Program="program"/>
                        </v-row>
                    </v-col>
                </v-row>
                <v-divider></v-divider>
            </v-card>
         </div>
         <div v-else>
                <v-card width="100%" class="pa-4 text-center">
                    <v-row justify="center">
                        لا يوجد برامج
                    </v-row>
                </v-card>
            <v-divider></v-divider>
         </div>
        <div class="container-small mb-3">
            <pagination :data="programs" @pagination-change-page="programs" class="mt-5"></pagination>
        </div>
    </v-container>
</div>
</template>

<script>
import {notification, notify} from "../../../Models/Models";
import programService from '../../../Services/ProgramService'

import showProgram from "./ShowProgram"
import deleteProgram from "./DeleteProgram"
import editProgram from "./EditProgram"
import addProgram from "./AddProgram"

export default {

    components: {
        showProgram,
        editProgram,
        deleteProgram,
        addProgram
    },

    data: function () {
        return {
            programs:{data:[]},
            q: '',
            notification,
        };
    },
    mounted(){
        this.getResults()
    },
    methods: {

         async getResults(){ this.programs = await programService.listOfPrograms(this.q) }

        ,findProgram(){ this.getResults()  }

        ,programAdded(isAdded=false){ isAdded ? this.sendNofitication() : this.sendErrorNotification()}

        ,programUpdated(isUpdated){ isUpdated ? this.sendNofitication() : this.sendErrorNotification()}

        ,programDeleted(isDeleted){ isDeleted? this.sendNofitication() : this.sendErrorNotification()}

        ,sendNofitication(){
                this.getResults()
                this.notification={...notify("لقد تم بنجاح","orange")}
        }
        ,sendErrorNotification(){ this.notification={...notify("لم يتم بنجاح !","error")} }

    },
    filters: {
         subStr     : (string) => string ? string.substring(0, 80) + '...' : ''
        ,adjustDate : (date)   => date? date.substring(0, 10):'لا يوجد تاريخ'
    },
    watch:{

    }
}
</script>
