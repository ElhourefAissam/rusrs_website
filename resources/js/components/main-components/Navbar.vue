<template>
  <v-container>
      <v-app-bar
      color="white"
      app
      scroll-target="#scrolling-techniques-3"
      >
        <v-toolbar flat>
            <v-toolbar-title>
                <v-avatar size="50">
                    <img :src="image" alt="no image">
                </v-avatar>
                شبكة وحدة للسلامة الطرقية بالصحراء
            </v-toolbar-title>

            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn class="grey--text title" text href="#events"> الفعاليات</v-btn>
                <v-btn class="grey--text title" text href="#articles"> المقالات</v-btn>
                <v-btn class="grey--text title" text href="#gallery"> المعرض</v-btn>
                <v-btn class="grey--text title" text href="#programs"> البرامج</v-btn>
                <v-btn class="grey--text title" text href="#members" >الاعضاء</v-btn>
            </v-toolbar-items>

        </v-toolbar>
      </v-app-bar>
 </v-container>

</template>

<script>
export default {
    props: [],
    data() {
        return {
            image:require('../../src/assets/navbar-logo.jpg'),
        }
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
