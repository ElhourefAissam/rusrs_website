<template>
     <v-app color="grey">
          <Navbar />
      <v-main>
            <masthead/>
      </v-main>
      <v-main>
            <events/>
            <articles/>
            <gallery/>
            <programs/>
            <members/>
      </v-main>

       <footerSection/>
    </v-app>
</template>
<script>
import Navbar from "./Navbar"
import masthead from "./Masthead"
import gallery from "./Gallery"
import articles from "./Articles"
import footerSection from "./Footer"
import events from "./Events"
import programs from "./Program"
import members from "./Members"

export default {

    components:{
        Navbar,
        masthead,
        gallery,
        articles,
        footerSection,
        events,
        programs,
        members,
    }
}
</script>
<style scoped>

</style>
