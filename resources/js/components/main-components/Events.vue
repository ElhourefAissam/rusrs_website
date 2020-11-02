<template>
<v-container class="mt-3">
    <section id="events">
     <h2 class="text-center grey--text">الفعاليات</h2>
    <v-card  >
        <v-card-title
        class="orange darken-3 white--text"
        >

        </v-card-title>
        <v-card-text class="py-0">
        <v-timeline dense>
            <v-slide-x-reverse-transition
            group
            hide-on-leave
            >
            <v-timeline-item
                v-for="x in 4"
                :key="x"
                :color="genColor()"
                small
                fill-dot
            >
                <v-alert
                :value="true"
                :color="genColor()"
                class="white--text heading-1"
                >
                <h2 class="my-2"> توصيف المكان العنوان الحدث </h2>
                <p>
                    بالصحراء ش.و.ل.ط  خروج  مقالات احذاث معرض برامج اعضاء الجمعية  المعرض الصور  الحدث الاحداث حدث توصيف المكان العنوان الحدث البداية النهاية تعديل الحدث  استمارة  تعديل الحدث من الى معلومات العضوالاسم الكامل الفايسبوك ة عضو جديد المنصب أعضاء الجمعية إبحث عضو في الجمعية  م إضافة حلقة او
                </p>
                <h4 class="white--text lighten-5 my-2">من  2020/2/2  الى   20020/1/2 </h4>
                </v-alert>
            </v-timeline-item>
            </v-slide-x-reverse-transition>
        </v-timeline>
        </v-card-text>
    </v-card>
    </section>
</v-container>
</template>

<script>

const COLORS = [
    'info',
    'warning',
    'error',
    'success',
  ]

export default {
    data: () => ({
        events:{},
        event:{}
    }),

    beforeDestroy () {

    },

    methods: {
      addEvent () {

      },

      genColor() {
          let count=0
          let color=''
          let previewsColor='warning'
          do{
               color = COLORS[Math.floor(Math.random() * 3)]
               if(color !== this.previewsColor)
               {
                   this.previewsColor=color
                   return color
               }
               count++;
          }while(this.previewsColor === color && count < COLORS.length)
      },
    },
  }

</script>

<style scoped>

</style>
