<template>
    <v-container>
        <section id="gallery" class="block">
            <h2 class="text-center grey--text">معرض الصور</h2>
            <v-row>
                <v-col
                    v-for="n in 9"
                    :key="n"
                    class="d-flex child-flex"
                    cols="12"
                    md="4"
                    sm="6"
                    xm="12"
                >
                    <v-img
                        :src="
                            `https://picsum.photos/500/300?image=${n * 5 + 10}`
                        "
                        aspect-ratio="1"
                        class="grey lighten-2"
                    >
                        <template v-slot:placeholder>
                            <v-row
                                class="fill-height ma-0"
                                align="center"
                                justify="center"
                            >
                                <v-progress-circular
                                    indeterminate
                                    color="grey lighten-5"
                                ></v-progress-circular>
                            </v-row>
                        </template>
                    </v-img>
                </v-col>
            </v-row>
        </section>
    </v-container>
</template>

<script>
export default {
    name: "Gallery",
    data() {
        return {
            Articles: {},
            article: {},
            q: ""
        };
    }
};
</script>
