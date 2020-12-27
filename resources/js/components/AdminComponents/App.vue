<template>
<v-app>
    <Navbar />
    <v-main color="grey accent-2" class="mx-4">
        <router-view />
    </v-main>
</v-app>
</template>

<script>
import Navbar from "./NavComponents/Navbar"
import Article from "./ArticleComponents/ArticleList.vue"
import Event from "./EventComponents/EventList.vue"
import Gallery from "./GalleryComponent/GalleryList.vue"
import Member from "./MemberComponents/MemberList.vue"
import Program from "./ProgramComponents/ProgramList.vue"

export default {
    components: {
        Navbar,
        Article,
        Event,
        Gallery,
        Member,
        Program
    }

}
</script>

<style scoped>
.v-application {
    background-color: #dbdbdb
}
</style>
