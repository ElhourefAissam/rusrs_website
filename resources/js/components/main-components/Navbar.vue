<template>
<!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img id="logo" src="assets/img/navbar-logo.jpg" alt="" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">خدمات</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">المعرض</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">من نحن</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">الاعضاء</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">تواصل معنا</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation-->
</template>
<script>
    export default {
        mounted() {
            console.log('navbar Component mounted.')
        }
    }
</script>
