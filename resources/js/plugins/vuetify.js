
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)

const opts = {
    rtl: true,
    icons: {
        iconfont: 'md', // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'
      },
      theme: {
        themes: {
          light: {
            primary: '#9652ff',
            secondary: '#3cd1c2',
            accent: '#ffaa2c',
            error: '#f83e70',
          },
        },
      },
}

export default new Vuetify(opts)
