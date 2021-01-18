<template>
    <dashboard-layout>


        <div class="main-content">
            <div class="header">
                <div class="container-fluid">
                    <div class="header-body">
                        <div class="row align-items-end">
                            <div class="col">
                                <h6 class="header-pretitle">
                                    Админ панель
                                </h6>
                                <h1 class="header-title">
                                    Продукты
                                </h1></div>
                        </div>
                    </div>
                </div>
            </div>


            <!--            {{ products }}-->


            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col"><h4 class="card-header-title">
                                                Продукты
                                            </h4></div>
                                            <div class="col-auto"><a
                                                :href="route('products.create')"
                                                class="btn btn-primary lift">
                                                Добавить
                                            </a></div>
                                        </div>
                                    </div>


                                    <div
                                        data-list="{&quot;valueNames&quot;: [&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]}"
                                        class="table-responsive mb-0">
                                        <div>
                                            <vue-good-table
                                                :columns="columns"
                                                :rows="rows"
                                                :fixed-header="false"
                                                :line-numbers="true"
                                                :search-options="{
                                                    enabled: true,
                                                    skipDiacritics: true,
                                                    placeholder: 'Поиск',
                                                }"
                                                :pagination-options="{
                                                    enabled: true,
                                                    mode: 'pages',
                                                    perPage: 10,
                                                    perPageDropdown: [10, 20, 30, 50],
                                                    position: 'bottom',
                                                    dropdownAllowAll: true,
                                                    setCurrentPage: 1,
                                                    nextLabel: 'след',
                                                    prevLabel: 'пред',
                                                    rowsPerPageLabel: 'Строк на странице',
                                                    ofLabel: 'из',
                                                    pageLabel: 'страница', // for 'pages' mode
                                                    allLabel: 'Все',
                                                  }"
                                            >
                                                <div slot="emptystate">
                                                    Нет записей
                                                </div>
                                                <template slot="table-row" slot-scope="props">
                                                    <span v-if="props.column.field == 'image'">
                                                        <img class="rounded" height="50" width="50" :src="'/storage/'+props.row.image.fileName">
                                                    </span>
                                                    <span v-else-if="props.column.field == 'actions'">
                                                     <button data-toggle="modal" data-target="#modalMembers"
                                                             title="Просмотреть" class="btn badge badge-info"
                                                             @click="modalData=props.row;">
                                                         <i class="fe fe-eye"></i>
                                                     </button>


                                                     <a :href="'/dashboard/products/'+props.row.id"
                                                        title="Редактировать" class="badge badge-success">
                                                         <i class="fe fe-eye"></i>
                                                     </a>

                                                     <a :href="'/dashboard/products/'+props.row.id+'/edit'"
                                                        title="Редактировать" class="badge badge-warning">
                                                         <i class="fe fe-edit"></i>
                                                     </a>

                                                     <button title="Удалить" class="btn badge badge-danger"
                                                             @click="delete_record(props.row.id)">
                                                            <i class="fe fe-trash"></i>
                                                    </button>
                                                    </span>
                                                    <span v-else-if="props.column.field == 'is_active'">
                                                         <span class="badge badge-danger" v-if="props.row.is_active==0">не активен</span>
                                                         <span class="badge badge-success" v-else-if="props.row.is_active==1">активен</span>
                                                    </span>
                                                </template>

                                            </vue-good-table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalMembers" tabindex="-1" style="display: none;" aria-hidden="true">

                <div role="document" class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div data-list="{&quot;valueNames&quot;: [&quot;name&quot;]}" class="modal-card card">
                            <div class="card-header"><h4 id="exampleModalCenterTitle" class="card-header-title">
                                Подробная информация
                            </h4>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                    aria-hidden="true">×</span></button>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush list my-n3">
                                    <li class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 ml-n2 py-3" v-for="column in columns" v-if="column.label!='Действия' && column.label!='Фото'">
                                                <h4 class="mb-1 name">
                                                    <b>{{ column.label }}:</b>
                                                    {{ MyEval(column.field) }}
                                                </h4>
                                            </div>
                                            <div class="col-lg-12 ml-n2 py-3">
                                                <h4 class="mb-1 name">
                                                    <b>Сырье:</b>
                                                    <div v-for="crude in modalData.crudes">
                                                        {{ crude.name }}
                                                    </div>
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </dashboard-layout>
</template>

<script>
import DashboardLayout from './../../Layouts/DashboardLayout'
import axios from "axios";


export default {

    components: {
        DashboardLayout
    },

    props: {
        products: Array
    },

    name: 'my-component',

    data() {
        return {
            columns: [
                {
                    label: 'Фото',
                    field: 'image',
                    sortable: false,
                },
                {
                    label: 'Имя',
                    field: 'name',
                },
                {
                    label: 'Артикул',
                    field: 'articul',
                },
                {
                    label: 'Количество',
                    field: 'quantity',
                },
                {
                    label: 'Себестоимость',
                    field: 'cost',
                },
                {
                    label: 'Наценка',
                    field: 'markup',
                },
                {
                    label: 'Цена',
                    field: 'price',
                },
                {
                    label: 'Категория',
                    field: 'category.name',
                },
                {
                    label: 'Статус',
                    field: 'is_active',
                },
                {
                    label: 'Дата создания',
                    field: 'created_at',
                    type: 'date',
                    dateInputFormat: "yyyy-MM-dd'T'HH:mm:ss.SSSSSS'Z'",
                    dateOutputFormat: 'dd-mm-yy hh:mm',
                },
                {
                    label: 'Действия',
                    field: 'actions',
                    sortable: false,
                }
            ],
            rows: this.products,
            modalData: {
                category: {
                    name: ''
                },
                crude: []
            }
        };
    },
    methods: {
        MyEval: function (str) {
            return eval('this.modalData.'+str);
        },
        delete_record: function (id) {

            this.$swal({
                title: 'Вы уверены?',
                text: "Продукт, а также все записи о нем на складах будут удалены безвозвратно!",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: "Да",
                        value: true,
                        visible: true,
                        className: "isConfirm",
                        closeModal: true
                    },
                    cancel: {
                        text: "Нет",
                        value: false,
                        visible: true,
                        className: "",
                        closeModal: true,
                    }
                }
            }).then((isConfirm) => {
                if (isConfirm === true) {
                    axios.delete(route("products.destroy", id))
                        .then(
                            (response) => {
                                const index = this.products.map(product => product.id).indexOf(id);
                                this.products.splice(index, 1);
                                this.$swal({title: response.data.message, timer: 3000})
                            },
                            (error) => {
                                console.log(error)
                            }
                        )
                }
            });



        }
    }

};


</script>
