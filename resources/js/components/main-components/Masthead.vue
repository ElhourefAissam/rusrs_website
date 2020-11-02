<template>

<div class="heroBlock">
    <v-carousel hide-delimiters cycle>
        <v-carousel-item
        v-for="(item,i) in items"
        :key="i"
        :src="item.src"
        reverse-transition="fade-transition"
        transition="fade-transition"
        >
        <v-row
          class="fill-height"
          align="center"
          justify="center"
        >
          <div class=" title">
            {{ item.title }}
          </div>
        </v-row>
        </v-carousel-item>
    </v-carousel>
 </div>

</template>

<script>
export default {
    data () {
      return {
        items: [
          {
            src:  require('../../src/assets/team1.jpeg'),
            title:" تنبيه   تحميل الصور نعم  لا تعديل",
          },
          {
            src:  require('../../src/assets/team2.jpeg'),
            title:"ى معلومات العضوالاسم الكامل الفايسبوك ",
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg',
            title:"العنوان الحدث البداية النهاية",
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg',
            title:" البداية النهاية تعديل الحدث  استمارة ",
          },
        ],
      }
    },

}
</script>
