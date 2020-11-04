<template>
<div class="Programs" color="grey">
     <v-container class="my-5 ">
        <h1 class="display2 grey--text">البرنامج</h1>
           <v-row justify="space-between">
                <v-col cols="12" md="5" sm="6">
                    <v-text-field
                        color="primary darken-2"
                        label="ابحث عن برنامج"
                        @change="FindProgram"
                        v-model="q"
                        hide-details="auto"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="4" sm="6">
                    <addProgram @ProgramAdded="getResults"></addProgram>
                </v-col>
            </v-row>

          <v-card class="my-2 pa-2" flat>
            <v-row>
                    <v-col cols="12" md="4" sm="2">
                        <h3 class="subtitle-1 grey--text"> اسم البرنامج</h3>
                    </v-col>
                    <v-col cols="12" md="4" sm="2">
                        <div class="subtitle-1 grey--text"> رابط البرنامج</div>
                    </v-col>
                    <v-col cols="12" md="4" sm="2">

                    </v-col>
            </v-row>
          </v-card>
        <v-card v-for="Program in Programs.data" :key="Program.id" flat class="pa-3">
            <v-row>
                <v-col cols="12" md="4" sm="2">
                    <div>{{Program.title}}</div>
                </v-col>
                <v-col cols="12" md="4" sm="2">
                     <div>{{ Program.link}}</div>
                </v-col>
                 <v-col cols="12" md="4" sm="2">
                     <v-row cols="12"  no-gutters>
                        <showProgram    :Program="Program"/>
                        <editProgram    :Program="Program"/>
                        <deleteProgram  :Program="Program"/>
                     </v-row>
                 </v-col>
            </v-row>
            <v-divider></v-divider>
        </v-card>
        <div class="container-small mb-3">
            <pagination :data="Programs" @pagination-change-page="getResults" class="mt-5"></pagination>
        </div>
     </v-container>
</div>
</template>

<script>
import Path from "../../../EnvPath";
import {Program} from "../../../Models/Models"
import showProgram from "./ShowProgram"
import deleteProgram from "./DeleteProgram"
import editProgram from "./EditProgram"
import addProgram from "./AddProgram"

const url = Path.baseUrl + "Program/";


export default {

    components:{
        showProgram,
        editProgram,
        deleteProgram,
        addProgram
    },

    data: function () {
        return {
            Programs: {},
            Program,
            q: '',

        }
    },
    mounted() {
        this.getResults();

    },
    methods: {

        getResults() {
            axios.get(url + this.q + '?page=1')
                .then(response => {
                    this.Programs = response.data;
            });
        },
        onSuccess(data){

            console.log(data)

            if(data.success){

            }else{

            }
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
