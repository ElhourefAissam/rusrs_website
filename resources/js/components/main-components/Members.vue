<template>
<v-container>
    <section id="members">
         <h2 class="text-center grey--text"> أعضاء الجمعية</h2>
    <v-timeline>
    <v-timeline-item
      v-for="n in 4"
      :key="n"
      large
    >
      <template v-slot:icon>
        <v-avatar size="90">
          <img src="http://i.pravatar.cc/64">
        </v-avatar>
      </template>
      <v-card class="elevation-2 light-blue darken-3">
        <v-card-title class="headline white--text">
          هشام امزور
        </v-card-title>
        <v-card-text class="white--text">
           الكاتب العام
        </v-card-text>
      </v-card>
    </v-timeline-item>
  </v-timeline>
    </section>
</v-container>
</template>

<script>
export default {

}
</script>
