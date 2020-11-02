<template>

<v-app>
    <Navbar />
    <v-main color="grey accent-2" class="mx-4">
        <router-view></router-view>
    </v-main>
</v-app>

<!-- <div class="">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse show sidebar-navigation" style="">
            <div class="sidebar-sticky pt-3">
                <Nav></Nav>
            </div>
        </nav>
        <div id="app" class="col-md-9 exapnd">
            <transition name="route" mode="out-in">
                <router-view :key="$route.path"></router-view>
            </transition>
        </div>
    </div>
</div> -->
</template>

<script>
import Navbar from "../NavComponents/Navbar"

export default {
    components:{
        Navbar
    }

}
</script>

<style scoped>

.v-application{
    background-color: #f5f5f5
}

.route-enter-to,
.route-leave {
    opacity: 0;
    transform: translateY(-30px);
}

.route-enter,
.route-leave-to {
    opacity: 1;
    transform: translateY(30px);
}

.route-enter-active,
.route-leave-active {
    transition: all 0.5s ease;
}

.sidebar-navigation {
    display: flex !important;
    justify-content: center;
    align-items: center;
    height: 120vh;
}

.exapnd {
    overflow: auto;

}
</style>
