<template>
  <v-container>
    <v-toolbar flat >
        <v-toolbar-title>
            <v-avatar size="50">
                <img src="../../../src/assets/navbar-logo.jpg" alt="no image">
            </v-avatar>
            شبكة وحدة للسلامة الطرقية بالصحراء
        </v-toolbar-title>

        <v-spacer></v-spacer>
        <v-toolbar-items>
            <v-btn class="grey--text title" text href="#" >الاعضاء</v-btn>
            <v-btn class="grey--text title" text href="#"> المعرض</v-btn>
            <v-btn class="grey--text title" text href="#"> البرامج</v-btn>
            <v-btn class="grey--text title" text href="#"> الاحداث</v-btn>
            <v-btn class="grey--text title" text href="#"> المقالات</v-btn>
        </v-toolbar-items>

    </v-toolbar>
 </v-container>

</template>

<script>
export default {
    props: [],
    data: function () {
        return {

        }
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
