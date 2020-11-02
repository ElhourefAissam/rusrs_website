<template>
    <v-app color="grey">
          <Navbar />
      <v-main>
            <masthead/>
            <gallery/>
            <articles/>
      </v-main>
      <footer>
          <Footer/>
      </footer>
    </v-app>
</template>
<script>
import Navbar from "./Navbar"
import masthead from "./Masthead"
import gallery from "./Gallery"
import articles from "./Articles"
import Footer from "./Footer"

export default {

    components:{
        Navbar,
        masthead,
        gallery,
        articles,
        Footer,
    }
}
</script>
<style scoped>

</style>
