<template>

 <nav>
    <v-row justify="center" justify-md="center" justify-lg="center">
            <v-app-bar color="light-grey accent-2" app flat>
                <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

                <v-toolbar-title class="grey--text darken-1 mr-3"
                    >تطبيق شبكة وحدة للسلامة الطرقية بالصحراء</v-toolbar-title
                >

                <v-spacer></v-spacer>

                <v-btn text>
                    <span class="grey--text darken-1">خروج</span>
                    <v-icon class="grey--text darken-1">exit_to_app</v-icon>
                </v-btn>
            </v-app-bar>
     </v-row>
            <v-navigation-drawer
                class="primary"
                v-model="drawer"
                absolute
                right
                temporary
            >
                <v-col align="center">
                    <v-list dense>
                        <v-row justify="center">
                            <v-avatar size="100px">
                                <v-img :src="image"></v-img>
                            </v-avatar>
                        </v-row>
                        <v-spacer></v-spacer>
                        <v-list-item-group
                            v-model="selectedItem"
                            color="secondary"
                            class=""
                        >
                            <v-list-item
                                v-for="(item, i) in items"
                                :key="i"
                                router
                                :to="item.route"
                            >
                                <v-list-item-icon>
                                    <v-icon color="white">{{ item.icon }}</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-title
                                        class="white--text"
                                        v-text="item.text"
                                    ></v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list-item-group>
                    </v-list>
                </v-col>
            </v-navigation-drawer>

 </nav>

</template>

<script>
export default {
    data() {
        return {
            drawer: false,
            mini: true,
            selectedItem: 1,
            items: [
                { text: "مقالات", icon: "article", route: "Article" },
                { text: "فعاليات ", icon: "folder", route: "Event" },
                { text: "اعضاء الجمعية", icon: "person", route: "Member" },
                { text: "برامج", icon: "video_library", route: "Program" },
                { text: "المعرض", icon: "photo_library", route: "Gallery" }
            ],
            image: require("../../../src/assets/navbar-logo.jpg")
        };
    }
};
</script>
