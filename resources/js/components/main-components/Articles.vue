<template>
    <section class="block latestPostBlock" id="articles">
        <v-container>
            <h2 class="text-center grey--text">مقالات</h2>
            <v-row>
                <v-col cols="12" xl="4" md="4" sm="12" v-for="x in 6" :key="x">
                    <v-card class="mx-auto" outlined>
                        <v-img
                            class="white--text align-end"
                            height="200px"
                            src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                        >
                            <v-card-title
                                >Top 10 Australian beaches</v-card-title
                            >
                        </v-img>

                        <v-card-subtitle class="pb-0">
                            Number 10
                        </v-card-subtitle>

                        <v-card-text class="text--primary">
                            <div>Whitehaven Beach</div>

                            <div>Whitsunday Island, Whitsunday Islands</div>
                        </v-card-text>

                        <v-card-actions>
                            <v-btn color="orange darken-1 white--text">
                                المزيد...
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </section>
</template>
<script>
export default {
    data() {
        return {};
    }
};
</script>
