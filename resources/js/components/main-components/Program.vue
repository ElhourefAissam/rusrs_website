<template>
<v-container fluid class="bg-grey">
<section class="block " id="programs">
    <h2 class="text-center grey--text">البرامج </h2>
<v-row>
    <v-col v-for="program in programs.data" :key="program.id" cols="12" md="4" sm="12">
        <v-card class="mx-auto">
            <videoPlayer :id="program.programId" />
            <!-- use toolstips to display the full program name -->
            <v-card-title>{{ program.title }}</v-card-title>
            <v-card-actions>
            </v-card-actions>
        </v-card>
    </v-col>
</v-row>
</section>
</v-container>
</template>

<script>
import Path from "../../EnvPath";
import videoPlayer from "../VideoComponents/displayVideo";


const url = Path.baseUrl + "Program/";

export default {
    components:{
        videoPlayer
    },
    data(){
        return{
            programs:{}
        }
    },
    created(){
        this.getResults()
    },
    methods:{
        getResults() {
            axios.get(url + '?page=1')
                .then(response => {
                    this.programs = response.data
            });
        }
    },
};
</script>

<style scoped>
.bg-grey{
    background-color: lightgrey;
}
</style>
