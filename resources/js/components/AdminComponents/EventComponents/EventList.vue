<template>
<div class="events" color="grey">
     <v-container class="my-5 ">
        <h1 class="display2 grey--text">الفعاليات </h1>
           <v-row justify="space-between">
                <v-col cols="12" md="5" sm="6">
                    <v-text-field
                        color="primary darken-2"
                        label="ابحث عن فعالية "
                        @change="FindEvent"
                        v-model="q"
                        hide-details="auto"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="4" sm="6">
                    <addEvent @EventAdded="getResults"></addEvent>
                </v-col>
            </v-row>

          <v-card class="my-2 pa-2" flat>
            <v-row>
                    <v-col cols="12" md="2" sm="4">
                        <h3 class="subtitle-1 grey--text">عنوان الفعالية</h3>
                    </v-col>
                    <v-col cols="12" md="2" sm="4">
                        <div class="subtitle-1 grey--text">توصيف الفعالية</div>
                    </v-col>
                    <v-col cols="12" md="2" sm="4">
                        <div class="subtitle-1 grey--text">مكان الفعالية</div>
                    </v-col>
                    <v-col cols="12" md="2" sm="4">
                        <div class="subtitle-1 grey--text"> العنوان </div>
                    </v-col>
                    <v-col cols="12" md="1" sm="4">
                        <div class="subtitle-1 grey--text">تاريخ البداية</div>
                    </v-col>
                    <v-col cols="12" md="1" sm="4">
                        <div class="subtitle-1 grey--text">تاريخ النهاية</div>
                    </v-col>
                    <v-col cols="12" md="2" sm="4">

                    </v-col>
            </v-row>
          </v-card>
        <v-card v-for="Event in Events.data" :key="Event.id" flat class="pa-3">
            <v-row >
                <v-col cols="12" md="2" sm="4">
                    <div class="grey--text">{{Event.title}}</div>
                </v-col>
                <v-col cols="12" md="2" sm="4">
                     <div  class="grey--text">{{ Event.description | subStr }}</div>
                </v-col>
                <v-col cols="12" md="2" sm="4">
                     <div class="grey--text">{{ Event.place | subStr }}</div>
                </v-col>
                <v-col cols="12" md="2" sm="4">
                    <div class="grey--text">{{ Event.address }}</div>
                </v-col>
                 <v-col cols="12" md="1" sm="4">
                    <div class="grey--text">{{ Event.start_date }}</div>
                </v-col>
                 <v-col cols="12" md="1" sm="4">
                    <div class="grey--text">{{ Event.end_date }}</div>
                </v-col>
                 <v-col cols="12" md="2" sm="4">
                     <v-row cols="12"  no-gutters>
                        <showEvent    :Event="Event"/>
                        <editEvent    :Event="Event"/>
                        <deleteEvent  :Event="Event"/>
                     </v-row>
                 </v-col>
            </v-row>
            <v-divider></v-divider>
        </v-card>
        <div class="container-small mb-3">
            <pagination :data="Events" @pagination-change-page="getResults" class="mt-5"></pagination>
        </div>
     </v-container>
</div>
</template>

<script>
import Path from "../../../EnvPath";
import addEvent from "./AddEvent";
import editEvent from "./EditEvent";
import showEvent from "./ShowEvent";
import deleteEvent from "./DeleteEvent";


const url = Path.baseUrl + "Event/";


export default {
    components:{
        addEvent,
        editEvent,
        showEvent,
        deleteEvent,
    },
    data: function () {
        return {
            Events: {},
            Event:{},
            q: ''
        }
    },
    mounted() {
        this.getResults();
    },
    created(){
        this.getResults()
    },
    methods: {

        getResults(page = 1) {

            axios.get(url + this.q + '?page=' + page)
                .then(response => {
                    console.log(response.data)
                    this.Events = response.data;
                });
        },

        getEvent(Event) {
            this.Event = {
                ...Event
            };
        },

        FindEvent() {

            if (this.q.length > 0) {

            axios.get(url + this.q)
                    .then(response => {
                        this.Events = response.data;
                    });

            } else this.getResults();
        },
    },
    filters: {

  	subStr: function(string) {
    	return string.substring(0,60) + '...';
        }

  }
}
</script>
<style scoped>

</style>
