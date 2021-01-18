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
                                    Заказы
                                </h1></div>
                        </div>
                    </div>
                </div>
            </div>


            <!--            {{ orders }}-->


            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col"><h4 class="card-header-title">
                                                Заказы
                                            </h4></div>
                                            <div class="col-auto"><a
                                                :href="route('orders.create')"
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
                                                    <span v-if="props.column.field == 'actions'">
                                                     <button data-toggle="modal" data-target="#modalMembers"
                                                             title="Просмотреть" class="btn badge badge-info"
                                                             @click="modalData=props.row;">
                                                         <i class="fe fe-eye"></i>
                                                     </button>

                                                        <a :href="'/dashboard/orders/'+props.row.id"
                                                           title="Редактировать"
                                                           class="badge badge-info">
                                                         <i class="fe fe-eye"></i>
                                                     </a>


                                                        <button title="Завершить заказ" class="btn badge badge-success"
                                                                @click="update_status(props.row.id)">
                                                            <i class="fe fe-check-square"></i>
                                                    </button>
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
                                            <div class="col-lg-12 ml-n2 py-3" v-for="column in columns"
                                                 v-if="column.label!='Действия'">
                                                <h4 class="mb-1 name">
                                                    <b>{{ column.label }}:</b>
                                                    {{ MyEval(column.field) }}
                                                </h4>
                                            </div>
                                            <div class="col-lg-12 ml-n2 py-3">
                                                <h4 class="mb-1 name">
                                                    <b>Продукты:</b>
                                                    <div v-for="product in modalData.products">
                                                        {{ product.name }}
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
        orders: Array
    },

    name: 'my-component',

    data() {
        return {
            columns: [
                {
                    label: 'Клиент',
                    field: 'client.name',
                    type: 'string',
                },
                {
                    label: 'Количество',
                    field: 'total',
                    type: 'number'
                },
                {
                    label: 'Статус',
                    field: 'status.name',
                    type: 'string'
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
            rows: this.orders,
            modalData: {
                client: {
                    name: ''
                },
                status: {
                    name: ''
                }
            }
        };
    },
    methods: {
        MyEval: function (str) {
            return eval('this.modalData.' + str);
        },
        update_status: function (id) {

            this.$swal({
                title: 'Вы уверены?',
                text: "Заказ будет завершен!",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "isConfirm",
                        closeModal: true
                    },
                    cancel: {
                        text: "Cancel",
                        value: false,
                        visible: true,
                        className: "",
                        closeModal: true,
                    }
                }
            }).then((isConfirm) => {
                if (isConfirm === true) {
                    axios.post(route("orders.completed", id))
                        .then(
                            (response) => {
                                this.$swal({title: response.data.message, timer: 3000})
                                const index = this.orders.map(order => order.id).indexOf(id);
                                this.orders[index].status = response.data.status;
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
