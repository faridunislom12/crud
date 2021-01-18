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
                                                Сырье
                                            </h6>
                                            <h1 class="header-title">
                                                Добавление
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form class="mb-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Артикул <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                   v-model="product.articul">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Название <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" v-model="product.name">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Размер <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                   v-model="product.size">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Ширина <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                   v-model="product.width">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Обхват <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                   v-model="product.girth">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Количество <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                   v-model="product.quantity">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Категория <span class="text-danger">*</span></label>
                                            <select v-model="product.category_id" class="custom-select">
                                                <option disabled selected value>Выберите категорию</option>
                                                <option :value="category.id" v-for="category in categories"
                                                        v-bind:key="category.id">{{ category.name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Себестоимость <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                   v-model="productCost">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Наценка <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                   v-model="productMarkup">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Цена <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                   v-model="product.price">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Распродажа</label>
                                            <input type="text" class="form-control"
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                   v-model="product.sale">
                                        </div>
                                    </div>

                                    <div class="col-2 pl-0">
                                        <div class="form-group float-right">
                                            <label for="validation">Активно</label>
                                            <div class="input-group" style="cursor: pointer">
                                                <div class="input-group-prepend">
                                                    <span @click="product.is_active=1"
                                                          :class="`input-group-text ${ product.is_active ? 'bg-primary text-white' : '' }`"
                                                          id="popular">Да</span>
                                                </div>
                                                <div class="input-group-append">
                                                    <span @click="product.is_active=0"
                                                          :class="`input-group-text ${ !product.is_active ? 'bg-primary text-white' : '' }`"
                                                          id="not_popular">Нет</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Сырьё <span class="text-danger">*</span></label>


                                            <multiselect v-model="productCrudes"
                                                         :options="selected_crudes.options" :multiple="true"
                                                         :close-on-select="false" :clear-on-select="false"
                                                         :preserve-search="true" placeholder="Выберите сырьё"
                                                         label="name" track-by="name" :preselect-first="false">
                                                <template slot="selection" slot-scope="{ values, search, isOpen }">
                                                        <span class="multiselect__single"
                                                              v-if="values.length &amp;&amp; !isOpen">Выбрано видов: {{
                                                                values.length
                                                            }}</span>
                                                </template>
                                            </multiselect>

                                            <!--                                            <pre class="language-json"><code>{{ product.crudes }}</code></pre>-->

                                            <br/>

                                            <table class="table table-sm table-nowrap">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Название</th>
                                                    <th scope="col">Артикул</th>
                                                    <th scope="col">Цена</th>
                                                    <th scope="col">Количество</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(crude, index) in product.crudes">
                                                    <th scope="row">{{ index + 1 }}</th>
                                                    <td>{{ crude.name }}</td>
                                                    <td>{{ crude.articul }}</td>
                                                    <td>{{ crude.price }}</td>
                                                    <td><input type="text" class="form-control border-0"
                                                               v-model="crude.crude_qty"> {{ crude.unit.name }}
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>


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
                                <button type="button" class="btn btn-block btn-primary"
                                        @click="create_record(product.id)">
                                    Сохранить
                                </button>
                                <a :href="route('products.index')" class="btn btn-block btn-link text-muted">
                                    Отмена
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
        categories: Array,
        crudes: Array,
    },
    name: 'my-component',
    data() {
        return {
            productCost: 0,
            productMarkup: 30,
            productCrudes: [],
            product: {
                name: '',
                articul: '',
                quantity: '',
                markup: '30',
                unit_id: '',
                image: [],
                cost: 0,
                sale: 0,
                price: '',
                is_active: 0,
                crudes: []
            },
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
            selected_crudes: {
                options: this.crudes
            },
        };
    },
    computed: {},
    watch: {
        productCost: function (val) {
            this.product.cost = val
            this.product.price = val * (1 + this.product.markup / 100)
            console.log(this.product.cost)
        },
        productMarkup: function (val) {
            this.product.markup = val
            this.product.price = this.product.cost * (1 + val / 100)
            console.log(this.product.cost)
        },
        productCrudes: function (val) {
            this.product.crudes = val
            var cost = 0
            val.forEach(element => cost += element.price * element.crude_qty)
            this.productCost = cost
            console.log(this.product.crudes)
        }

    },
    methods: {
        create_record: function (id) {
            this.checkDropzoneFiles()
            axios.post(route("products.store", id), this.product)
                .then((response) => {
                    console.log(response)
                    this.$swal({title: response.data.message, timer: 3000})
                    this.$inertia.visit('/dashboard/products');
                })
                .catch((error) => {
                    this.$swal('Ошибка', 'Введите корректные данные', 'error')
                })
        },
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
                    this.product.image = {
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

