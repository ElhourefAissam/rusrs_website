<template>
    <v-footer dark padless>
        <v-card flat tile outlined width="100%" class="orange darken-4 white--text text-center">
            <v-card-text>
                <v-btn
                    v-for="(icon, index) in icons"
                    :key="index"
                    class="mx-4 white--text"
                    icon
                    :href="icon.link"
                    target="_blank"
                >
                    <v-icon size="24px">
                        {{ icon.name }}
                    </v-icon>
                </v-btn>
            </v-card-text>

            <v-card-text class="white--text pt-0">
                <h3>
            شبكة وحدة للسلامة الطرقية بالصحراء  التزام  شراكة مسؤولية ،  لنتحد معا لمحاربة حوادث السير ونشر السلامة الطرقية.
                </h3>
             </v-card-text>

            <v-divider></v-divider>

            <v-card-text class="white--text montserrat">
                2020 — <strong>Made by AMZOUR Hicham , ELHOUREF Aissam</strong>
            </v-card-text>
        </v-card>
    </v-footer>
</template>
<script>
export default {
    name: "footerSection",

    data() {
        return {
            icons: [
                {
                    name: "facebook",
                    link: "https://www.facebook.com/RUSRS.officiel"
                },
                {
                    name: "video_library",
                    link: "https://www.youtube.com/user/nadifnet"
                },
                { name: "email", link: "rucasrs@gmail.com" }
            ]
        };
    }
};
</script>
