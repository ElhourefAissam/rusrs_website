<template>
<v-row>
    <v-dialog v-model="dialog" persistent max-width="600px" hide-overlay transition="dialog-bottom-transition">
        <template v-slot:activator="{ on, attrs }">
            <v-btn color="primary" dark v-bind="attrs" v-on="on">
                مقالة جديدة
            </v-btn>
        </template>
        <v-card>
            <v-toolbar dark color="primary">
                <v-btn icon dark @click="resetValidation">
                    <v-icon>close</v-icon>
                </v-btn>
                <v-toolbar-title>
                    استمارة إدخال مقالة جديدة
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                    <v-btn dark text @click="AddArticle">
                        حفض
                    </v-btn>
                </v-toolbar-items>
            </v-toolbar>

            <v-card-title> </v-card-title>
            <v-card-text>
                <v-container>
                    <v-alert text outlined color="error" icon="fire" v-if="error">
                        <v-btn class="ml-3" x-small text fab @click="error = !error">
                            <v-icon>close</v-icon>
                        </v-btn>
                        <span class="white-text ">هناك خطأ ، المرجو إدخال معلومات صحيحة !!!</span>
                    </v-alert>

                    <v-form ref="form">
                        <v-row justify="space-between">
                            <v-col cols="12" sm="6" md="5">
                                <v-text-field label="عنوان المقالة*" required hint="عنوان المقالة" prepend-icon="article" v-model="Article.title" :rules="rules"></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="5">
                                <v-text-field label="كاتب المقالة" hint="كاتب المقالة" prepend-icon="account_circle" v-model="Article.author"></v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-textarea label="نص المقالة*" required prepend-icon="description" v-model="Article.article_body" :rules="rules"></v-textarea>
                            </v-col>
                        </v-row>
                        <v-divider></v-divider>
                        <v-row>
                            <v-col cols="12">
                                <v-file-input chips multiple label="تحميل الصور"></v-file-input>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-container>
            </v-card-text>
        </v-card>
    </v-dialog>
</v-row>
</template>

<script>
import {
    Article,
    UploadImagesModel
} from "../../../Models/Models";
import articleService from "../../../Services/ArticleService";

export default {
    data: function () {
        return {
            Article,
            UploadImagesModel,
            dialog: false,
            rules: [v => v.length > 0 || "المرجو ملئ الأماكن الفارغة"],
            error: false,
        };
    },
    methods: {
        async AddArticle() {
            if (this.$refs.form.validate()) {
                if (!this.Article.author) this.Article.author = 'لايوجد'
                const isAdded = await articleService.addArticle(this.Article)
                this.$emit("articleAdded", isAdded.success);
                //this.UploadImagesModel.formData.append("modelId",response.data.id)
                //this.addImages()
                this.dialog = false
            } else {
                this.error = !this.$refs.form.validate();
            }
        },

        getDateObject(data) {
            this.UploadImagesModel.formData = data.formData;
            this.UploadImagesModel.config = data.config;
        },

        addImages() {
            axios
                .post(
                    url,
                    this.UploadImagesModel.formData,
                    this.UploadImagesModel.config
                )
                .then(response => {
                    this.dialog = false;
                    this.$emit("articleAdded");
                })
                .catch(err => {
                    console.log(err);
                });
        },
        resetValidation() {
            this.error = false
            this.dialog = false
        }
    }
};
</script>
