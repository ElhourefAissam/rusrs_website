<template>
<v-col md="4">
    <v-dialog
       v-model="dialog"
       transition="dialog-bottom-transition"
       hide-overlay
       max-width="900px"
    >
    <template v-slot:activator="{ on, attrs }">
        <v-btn
            color="primary"
            dark
            v-bind="attrs"
            v-on="on"
            small
        >
        <v-icon>info</v-icon>
        </v-btn>
    </template>
  <v-card class="pa-4">
    <v-row align="center">
    <v-item-group
    v-model="window"
    class="shrink mr-6"
    mandatory
    tag="v-flex"
    >
      <v-item
        v-for="n in length"
        :key="n"
        v-slot="{ active, toggle }"
      >
        <div>
          <v-btn
            :input-value="active"
            icon
            @click="toggle"
          >
            <v-icon>panorama_fish_eye</v-icon>
          </v-btn>
        </div>
      </v-item>
    </v-item-group>

    <v-col>
        <v-row
        class="mb-4"
        align="center"
        >
        <v-avatar
            color="grey"
            class="mr-4"
        ></v-avatar>
        <strong class="title">{{Event.title}}</strong>
        <v-spacer></v-spacer>
        <v-btn icon>
            <v-icon>account</v-icon>
        </v-btn>
        </v-row>

        <p>
        {{Event.description}}
        </p>

        <p>
            {{Event.place}} - {{Event.addres}}
        </p>

        <p>
            من {{Event.start_date}} الى {{Event.end_date}}
        </p>
    </v-col>
  </v-row>
</v-card>
</v-dialog>
</v-col>
</template>

>

<script>
import Path from "../../EnvPath";

const url = Path.baseUrl + "Event";

export default {
    props: ['Event'],
    data: function () {
        return {

            dialog: false,
            notifications: false,
            sound: true,
            widgets: false,
            length: 1,
            window: 0,
        }
    }
}
</script>>
