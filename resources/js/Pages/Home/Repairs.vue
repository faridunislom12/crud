<template>
    <app-layout class="wrapper">
        <section id="content">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-5">
                      <li class="breadcrumb-item"><a :href="route('home')">Главная</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Ремонт</li>
                    </ol>
                </nav>

                <div class="az-repairs">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                          <div class="card py-3 border-0 bg-light">
                            <div class="card-body">
                                <h3 class="card-title">Ремонт от бренда <strong class="text-danger">“Азам”</strong></h3>
                                <p class="card-text">Вся обувь от нашего бренда ремонтируеться  на 50% дешевле.</p>
                            </div>
                            <label for="image" class="cursor-pointer">
                                <img :src="bidCrudImage ? bidCrudImage : '/images/icons/no-photo-repairs.svg'" class="card-img-top my-4" alt="...">
                            </label>
                            <div class="card-body">
                                <form action="">
                                    <input type="file" class="d-none" name="image" id="image" @change="handleUpload($event, 0)">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control feedback-input bg-light" id="name" v-model="bidCrud.name" name="name" placeholder="Введите имя">
                                        <label for="name">Имя</label>
                                    </div>
                                    <div class="form-floating mb-5">
                                        <input type="text" class="form-control feedback-input bg-light" id="phone" v-model="bidCrud.phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="phone" placeholder="Введите номер телефона">
                                        <label for="phone">Контакты</label>
                                    </div>
                                    <button type="button" :disabled="!showButton.t0" class="btn btn-outline-dark rounded-0 w-100 py-3 fs-4" @click="sendBid(0)">Отправить заявку</button>
                                </form>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                            <div class="card py-3 border-0 bg-light">
                                <div class="card-body">
                                    <h3 class="card-title">Ремонт обуви другого <strong>Бренда</strong></h3>
                                    <p class="card-text">Оставьте заявку и мы оценим состояние вашей обуви для подготовки цены на ремонт</p>
                                </div>
                                <label for="other-image" class="cursor-pointer">
                                    <img :src="bidOtherImage ? bidOtherImage : '/images/icons/no-photo-repairs.svg'" class="card-img-top my-4" alt="...">
                                </label>
                                <div class="card-body">
                                    <form action="" class="">
                                        <input type="file" class="d-none" name="image" id="other-image" @change="handleUpload($event, 1)">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control feedback-input bg-light" id="name" v-model="bidOther.name" placeholder="Введите имя">
                                            <label for="name">Имя</label>
                                        </div>
                                        <div class="form-floating mb-5">
                                            <input type="text" class="form-control feedback-input bg-light" id="phone" v-model="bidOther.phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Введите номер телефона">
                                            <label for="phone">Контакты</label>
                                        </div>
                                        <button type="button" :disabled="!showButton.t1" class="btn btn-outline-dark rounded-0 w-100 py-3 fs-4" @click="sendBid(1)">Отправить заявку</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout'
export default{
    components: {
        AppLayout
    },
    props: {
        lastProducts: Array,
        patrtners: Array,
        sliders: Array,
    },
    data() {
        return {
            showButton: {
                t0: true,
                t1: true
            },
            bidCrud: {
                name: '',
                phone: '',
                image: ''
            },
            bidOther: {
                name: '',
                phone: '',
                image: ''
            },
            bidOtherImage: '',
            bidCrudImage: ''
        }
    },
    mounted() {
    },
    methods: {
        handleUpload($event, type){
            if (type && $event.target.files.length>0){
                this.bidOther.image = $event.target.files[0]
                this.bidOtherImage = URL.createObjectURL(this.bidOther.image);
            } else if (!type && $event.target.files.length>0) {
                this.bidCrud.image = $event.target.files[0]
                this.bidCrudImage = URL.createObjectURL(this.bidCrud.image);
            }
        },
        sendBid(type){
            if (!(this.bidCrud.name && this.bidCrud.phone && this.bidCrud.image && type === 0) && !(this.bidOther.name && this.bidOther.phone && this.bidOther.image && type === 1)) {
                this.$swal({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Введите корректные данные',
                    showConfirmButton: true,
                    timer: 2000
                })
                return 0
            }

            let fd = new FormData();

            fd.append('name', type === 1 ? this.bidOther.name : this.bidCrud.name);
            fd.append('phone', type === 1 ? this.bidOther.phone : this.bidCrud.phone);
            fd.append('image', type === 1 ? this.bidOther.image : this.bidCrud.image);
            fd.append('type', type);

            this.showButton['t'+type] = false

            axios.post(route('repairs-save'), fd, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(response=> {
                    this.$swal({
                        position: 'top-end',
                        icon: 'success',
                        title: response.data.message,
                        showConfirmButton: true,
                        timer: 2000
                    })
            })
            .catch(error=> {
                this.$swal({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Введите корректные данные',
                    showConfirmButton: true,
                    timer: 2000
                })
            })
        }
    }
}
</script>
