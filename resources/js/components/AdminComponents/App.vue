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

export default {
    components: {
        Navbar
    }

}
</script>

<style scoped>
.v-application {
    background-color: #dbdbdb
}
</style>
