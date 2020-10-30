<template>
<div>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <button v-if="!admin" type="button" class="btn btn-outline-primary">تسجيل</button>
            <h6 v-else class="nav-link js-scroll-trigger border border-primary text-white">مرحبا</h6>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                القائمة
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto mr-4">
                    <li v-if="isadmin" @click="admin=isadmin" class="nav-item"><a class="btn btn-info nav-link js-scroll-trigger" href="">الإدارة</a></li>
                    <li @click="admin=false" class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">تواصل معنا</a></li>
                    <!-- <li @click="admin=false" class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">خدمات</a></li> -->
                    <li @click="admin=false" class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">الاعضاء</a></li>
                    <li @click="admin=false" class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">المعرض</a></li>
                    <li @click="admin=false" class="nav-item"><a class="nav-link js-scroll-trigger" href="#programs">البرامج</a></li>
                    <li @click="admin=false" class="nav-item"><a class="nav-link js-scroll-trigger" href="#articles">المقالات</a></li>
                    <li @click="admin=false" class="nav-item"><a class="nav-link js-scroll-trigger" href="#events">الاحداث</a></li>
                </ul>
            </div>
        </div>
        <a class="navbar-brand js-scroll-trigger right-0" href="http://rusrs-website.test/"><img id="logo" src="assets/img/navbar-logo.jpg" alt="" /></a>
    </nav>
    <!-- Navigation-->
    <div class="mt-10">
        <!-- <main-page v-if="!admin" />
        <admin-app v-else /> -->

    </div>
</div>
</template>

<script>
export default {
    props: ['isadmin'],
    data: function () {
        return {
            admin: this.isadmin
        }
    },
    mounted() {
        console.log('navbar Component mounted.')
    }
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
