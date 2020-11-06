<template>
<v-container>
    <v-row>
     <h1 class="display2 grey--text">المعرض </h1>
     <v-spacer></v-spacer>
     <addGallery/>
    </v-row>
    <v-row>
        <v-col
        v-for="n in 9"
        :key="n"
        class="d-flex child-flex"
        cols="4"
        >
        <v-fade-transition mode="out-in">
            <v-card>
                <v-img
                :src="require('../../../src/assets/team2.jpeg')"
                height="125"
                class="grey darken-4"
                ></v-img>
                <v-row>
                    <v-col cols="12" md="12">
                        <v-card-title class="title">
                        height
                        </v-card-title>
                         <v-row>
                            <v-col md="2" class="mr-4" > <galleryDetails   :gallery="gallery"/></v-col>
                            <v-col md="2" > <deleteGallery    :gallery="gallery"/></v-col>
                            <v-col md="2">  <editGallery      :gallery="gallery"/></v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </v-card>
        </v-fade-transition>
        </v-col>
  </v-row>
  </v-container>
</template>
<script>
import addGallery from "./AddGallery"
import editGallery from "./editGallery"
import deleteGallery from "./deleteGallery"
import galleryDetails from "./GalleryDetails"

export default {
    components:{
        addGallery,
        editGallery,
        deleteGallery,
        galleryDetails,
    },
    data(){
        return {
            gallery:{}
        }
    },
    methods:{

    }


}
</script>
