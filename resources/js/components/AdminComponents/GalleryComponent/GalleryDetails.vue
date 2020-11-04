<template>
<div>
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

 <v-card
    class="mx-auto"
    max-width="900"
  >
    <v-img
      src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
      height="200px"
    ></v-img>
 </v-card>


</v-dialog>
</div>
</template>
<script>
export default {
    props:["gallery"],
    data(){
        return{
            dialog:false
        }
    }
}
</script>
<style scoped>

</style>
