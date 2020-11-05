<template>
    <div class="heroBlock">
        <section>
            <v-carousel
                hide-delimiters
                cycle
                progress="true"
                dark
                height="88vh"
                class="mb-5"
            >
                <v-carousel-item
                    v-for="(item, i) in items"
                    :key="i"
                    :src="item.src"
                    reverse-transition="fade-transition"
                    transition="fade-transition"
                >
                <v-row class="fill-height" align="center" justify="center">
                    <div class=" title">
                        {{ item.title }}
                    </div>
                </v-row>
                </v-carousel-item>
            </v-carousel>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            items: [
                {
                    src: require("../../src/assets/team1.jpeg"),
                    title: "التزام  شراكة مسؤولية"
                },
                {
                    src: require("../../src/assets/team2.jpeg"),
                    title: "لنتحد معا لمحاربة حوادث السير ونشر السلامة الطرقية"
                }
            ]
        };
    }
};
</script>
