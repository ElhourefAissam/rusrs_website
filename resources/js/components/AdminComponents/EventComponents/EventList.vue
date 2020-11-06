<template>
<div class="events" color="grey">
     <notification :notification="notification"/>
     <v-container class="my-5 ">
        <h1 class="display2 grey--text">الفعاليات </h1>
           <v-row justify="space-between">
                <v-col cols="12" md="5" sm="6">
                    <v-text-field
                        color="primary darken-2"
                        label="ابحث عن فعالية "
                        @keyup="findEvent"
                        v-model="q"
                        hide-details="auto"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="4" sm="6">
                    <addEvent @eventAdded="eventAdded"></addEvent>
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
        <div v-if="events.data.length >0" >
        <v-card v-for="event in events.data" :key="event.id" flat class="pa-3">
            <v-row >
                <v-col cols="12" md="2" sm="4">
                    <div class="grey--text">{{event.title}}</div>
                </v-col>
                <v-col cols="12" md="2" sm="4">
                     <div  class="grey--text">{{ event.description | subStr }}</div>
                </v-col>
                <v-col cols="12" md="2" sm="4">
                     <div class="grey--text">{{ event.place | subStr }}</div>
                </v-col>
                <v-col cols="12" md="2" sm="4">
                    <div class="grey--text">{{ event.address }}</div>
                </v-col>
                 <v-col cols="12" md="1" sm="4">
                    <div class="grey--text">{{ event.start_date }}</div>
                </v-col>
                 <v-col cols="12" md="1" sm="4">
                    <div class="grey--text">{{ event.end_date }}</div>
                </v-col>
                 <v-col cols="12" md="2" sm="4">
                     <v-row cols="12"  no-gutters>
                        <showEvent    :Event="event"/>
                        <editEvent   @eventUpdated="eventUpdated"   :Event="event"/>
                        <deleteEvent @eventDeleted="eventDeleted"   :Event="event"/>
                     </v-row>
                 </v-col>
            </v-row>
            <v-divider></v-divider>
        </v-card>
        </div>
        <div v-else>
        <v-card flat>
            <v-row class="text-center pa-4" justify-md="center" justify="center">
                <h3 class="grey--text lighten-1">لا توجد فعاليات</h3>
            </v-row>
        </v-card>
       </div>
        <div class="container-small mb-3">
            <pagination :data="events" @pagination-change-page="events" class="mt-5"></pagination>
        </div>
     </v-container>
</div>
</template>

<script>
import {notification, notify} from "../../../Models/Models";
import eventService from "../../../Services/EventService";

import addEvent from "./AddEvent";
import editEvent from "./EditEvent";
import showEvent from "./ShowEvent";
import deleteEvent from "./DeleteEvent";

export default {
    components:{
        addEvent,
        editEvent,
        showEvent,
        deleteEvent,
    },
    data: function () {
        return {
            events:{data:[]},
            q: '',
            notification,
        };
    },
    mounted(){
        this.getResults()
    },
    methods: {

         async getResults(){ this.events= await eventService.listOfEvents(this.q) }

        ,findEvent(){ this.getResults()}

        ,eventAdded(isAdded=false){ isAdded ? this.sendNofitication() : this.sendErrorNotification()}

        ,eventUpdated(isUpdated){ isUpdated ? this.sendNofitication() : this.sendErrorNotification()}

        ,eventDeleted(isDeleted){ isDeleted? this.sendNofitication() : this.sendErrorNotification()}

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
