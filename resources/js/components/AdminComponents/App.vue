<template>
<div class="">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse show" style="">
            <div class="sidebar-sticky pt-3">
                <Nav></Nav>

                <ul>
                </ul>

            </div>
        </nav>
        <div id="app" class="col-md-9">
            <transition name="route" mode="out-in">
                <router-view :key="$route.path"></router-view>
            </transition>
        </div>
    </div>
</div>
</template>

<script>
export default {

}
</script>

<style scoped>
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
</style>
