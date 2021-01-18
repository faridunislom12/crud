<template>
    <dashboard-layout>
        <div class="main-content">
            <div class="card">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-8">
                            <div class="header mt-md-5">
                                <div class="header-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="header-pretitle">
                                                Заказ
                                            </h6>
                                            <h1 class="header-title">
                                                Просмотр
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form class="mb-4">

                                <div class="card col">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <!-- Title -->
                                                <h6 class="text-uppercase text-muted mb-2">
                                                    Клиент
                                                </h6>
                                                <!-- Heading -->
                                                <span class="h2 mb-0">{{ this.order.client.name + ' (' + this.order.client.email + ')'}}</span>
                                            </div>
                                        </div> <!-- / .row -->
                                    </div>
                                </div>


                                <div class="card" v-for="orderColumn in [{name: 'Итог', value: this.order.total},
                {name: 'Статус', value: this.order.status_id},
                {name: 'Количество продуктов', value: this.order.products.length}]">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <!-- Title -->
                                                <h6 class="text-uppercase text-muted mb-2">
                                                    {{ orderColumn.name }}
                                                </h6>
                                                <!-- Heading -->
                                                <span class="h2 mb-0">{{ orderColumn.value }}</span>
                                            </div>
                                        </div> <!-- / .row -->
                                    </div>
                                </div>



                                <div class="card col">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">

                                                <!-- Title -->
                                                <h6 class="text-uppercase text-muted mb-2">
                                                    Продукты
                                                </h6>
                                                <!-- Heading -->

                                            <vue-good-table
                                                :columns="products.columns"
                                                :rows="products.rows">
                                                <div slot="emptystate">
                                                    Продукт не выбран
                                                </div>
                                            </vue-good-table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Картинка</label>
                                            <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"
                                                          style="border: 2px dashed #999999;"></vue-dropzone>
                                        </div>
                                    </div>
                                </div>
                                <a :href="route('orders.index')" class="btn btn-block btn-link text-muted">
                                    Назад
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </dashboard-layout>
</template>

<script>
import DashboardLayout from './../../Layouts/DashboardLayout'
import vue2Dropzone from 'vue2-dropzone'

import axios from "axios";

export default {
    components: {
        DashboardLayout,
        vueDropzone: vue2Dropzone
    },
    props: {
        order: Object,
    },
    name: 'my-component',
    data() {
        return {
            dropzoneOptions: {
                url: '/upload-files',
                thumbnailWidth: 150,
                maxFilesize: 100,
                maxFiles: 1,
                addRemoveLinks: true,
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                },
                dictDefaultMessage: 'Выберите файл'
            },
            products: {
                columns: [
                    {
                        label: 'Имя',
                        field: 'name',
                        type: 'string',
                    },
                    {
                        label: 'Артикул',
                        field: 'articul',
                        type: 'number',
                    },
                    {
                        label: 'Количество',
                        field: 'quantity',
                        type: 'number'
                    },
                    {
                        label: 'Ед. измерения',
                        field: 'unit.name',
                        type: 'number'
                    },
                ],
                rows: this.order.products,
            },
        };
    },
    mounted() {
    },
    methods: {
        checkDropzoneFiles() {
            let files = this.$refs.myVueDropzone.dropzone.files
            if (files && files.length > 0) {
                if (files[0].status === 'success') {
                    let fileName = JSON.parse(files[0].xhr.response).fileName
                    let fileType = {
                        size: files[0].size,
                        name: files[0].name,
                        type: files[0].type,
                    };
                    this.order.image = {
                        fileName,
                        fileType
                    }
                }
            }
        },
    }
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

