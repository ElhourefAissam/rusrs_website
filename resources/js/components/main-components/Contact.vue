<template>
     <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">تواصل معنا</h2>
                    <h3 class="section-subheading text-muted">.يمكنك ان تتواصل معنا من خلال ملئ الاستمارة أسفله</h3>
                </div>
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="ادخل الإسم الكامل *" required="required" data-validation-required-message="ادخل الإسم الكامل" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="ادخل البريد الالكتروني *" required="required" data-validation-required-message="ادخل البريد الالكتروني" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel" placeholder="ادخل رقم الهاتف *" required="required" data-validation-required-message="ادخل رقم الهاتف" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" placeholder="أكتب رسالتك الينا *" required="required" data-validation-required-message="أكتب رسالتك الينا"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">إرسال</button>
                    </div>
                </form>
            </div>
        </section>
</template>
<script>
export default {

}
</script>
