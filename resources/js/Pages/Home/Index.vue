<template>
    <app-layout class="wrapper">
        <section id="content">
            <div class="container">
                <div id="main-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div :class="`carousel-item ${index===0 && 'active'}`" data-bs-interval="10000" v-for="(slider, index) in sliders" :key="index">
                            <img :src="slider.image && '/storage/' + slider.image.fileName" class="d-block w-100" alt="...">
                            <div class="carousel-item-content col-6 text-white">
                                <h1 class="display-5 text-uppercase">{{ slider.title }}</h1>
                                <hr class="col-2 bg-white">
                                <p class="lead my-3" v-html="slider.short_desc"></p>
                                <a href="" class="btn btn-danger rounded-0 py-3 px-5 mt-5" type="button">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    <div class="az-navs-slider">
                        <a class="carousel-control-prev" href="#main-carousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#main-carousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>

                <div id="main-category" class="mt-5">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100 border-0 bg-light">
                                <div class="card-body py-4 px-5">
                                    <h5 class="card-title"><strong>Мужские</strong> Товары</h5>
                                    <p class="card-text">Ботинки, кеды, мокасины, полуботинки
                                        сапоги, тапочки и шлепанцы, туфли.</p>
                                    <a href="http://" class="text-dark fw-bold">Подробнее</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 bg-light">
                                <div class="card-body  py-4 px-5">
                                    <h5 class="card-title"><strong>Женские</strong> Товары</h5>
                                    <p class="card-text">Ботинки, кеды, мокасины, полуботинки
                                        сапоги, тапочки и шлепанцы, туфли.</p>
                                    <a href="http://" class="text-dark fw-bold">Подробнее</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 bg-light">
                                <div class="card-body  py-4 px-5">
                                    <h5 class="card-title"><strong>Детские</strong> Товары</h5>
                                    <p class="card-text">Ботинки, кеды, мокасины, полуботинки
                                        сапоги, тапочки и шлепанцы, туфли.</p>
                                    <a href="http://" class="text-dark fw-bold">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>

                <div class="az-products">
                    <div class="product-news">
                        <div class="az-title d-flex mb-5">
                            <hr class="col-1 bg-dark me-4">
                            <h3>Новые товары</h3>
                        </div>
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            <div class="col" v-for="(product, index) in lastProducts" v-bind:key="index">
                                <div class="card bg-linear-light cursor-pointer border-0 pb-4 px-5">
                                    <img :src="product.image && '/storage/' + product.image.fileName" class="mx-auto" width="207" height="221">
                                    <div class="card-body px-0">
                                        <h5 class="card-title">{{ product.name }}</h5>
                                        <nav class="card-text">{{ product.sale }} %</nav>
                                        <span class="fs-4 text-uppercase">{{ product.price }} TJS</span>
                                    </div>
                                    <div class="az-add-product justify-content-around">
                                        <img src="/images/icons/product_cart.svg">
                                        <button type="button" class="btn bg-brown text-white rounded-0 w-75">Купить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>

                    <div class="product-news">
                        <div class="az-title d-flex mb-5">
                            <hr class="col-1 bg-dark me-4">
                            <h3>Распродажа</h3>
                        </div>

                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            <div class="col" v-for="(product, index) in saleProducts" v-bind:key="index">
                                <div class="card bg-linear-light border-0 cursor-pointer pb-4 px-5">
                                    <img :src="product.image && '/storage/' + product.image.fileName" class="mx-auto" width="207" height="221">
                                    <div class="card-body px-0">
                                        <h5 class="card-title">{{ product.name }}</h5>
                                        <nav class="card-text">{{ product.sale }} %</nav>
                                        <span class="fs-4 text-uppercase">{{ product.price }} TJS</span>
                                    </div>
                                    <div class="az-add-product justify-content-around">
                                        <img src="/images/icons/product_cart.svg">
                                        <button type="button" class="btn bg-brown text-white rounded-0 w-75">Купить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="az-about">
                    <div class="row">
                        <div class="col-12">
                            <div class="az-title d-flex my-5">
                                <hr class="col-1 bg-dark me-4">
                                <h3>Кто носит нашу обувь</h3>
                            </div>
                            <div class="about--content">
                                <div class="row  align-items-center">
                                    <div class="col-6 text-center">
                                        <span class="fs-6">Даниель Рустамов</span>
                                        <p class="fs-2 mt-3 mb-5">В чем состоит <br> уникальность обуви?</p>
                                        <a href="http://" class="btn btn-outline-dark rounded-0 px-5">Подробнее</a>
                                    </div>

                                    <div class="col-6">
                                        <img src="/images/daniel-rustamov.png" alt="" class="img-custom-shadow" width="487" height="484">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="az-partners">
                    <div class="az-title d-flex my-5">
                        <hr class="col-1 bg-dark me-4">
                        <h3>Наши Партнёры</h3>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col" v-for="(patrtner, index) in patrtners" v-bind:key="index">
                            <div class="card mb-3 border-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img :src="patrtner.image && '/storage/' + patrtner.image.fileName" alt="..." width="160">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body ps-4">
                                            <h5 class="card-title"><a :href="patrtner.link" class="card-title text-dark">{{ patrtner.name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="az-stay-partners">
                    <div class="az-title d-flex my-5">
                        <hr class="col-1 bg-dark me-4">
                        <h3>Наши Партнёры</h3>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-lg-6 col-12">
                            <div class="bg-light px-5 py-4 h-100">
                                <h3 class="fs-2 mb-3">Как стать партнёром?</h3>
                                <p class="lh-lg">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, Lorem Ipsum is simply dummy text of the printing and </p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12">
                            <form action="" class="">
                                <div class="form-floating mb-3">
                                    <input type="text" v-model="bid.name" class="form-control feedback-input" id="name" placeholder="Введите имя">
                                    <label for="name">Имя</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" v-model="bid.city" class="form-control feedback-input" id="city" placeholder="Введите город">
                                    <label for="city">Город</label>
                                </div>
                                <div class="form-floating mb-5">
                                    <input type="text" v-model="bid.phone" class="form-control feedback-input" id="phone" maxlength="9" placeholder="Введите номер телефона" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    <label for="phone">Контакты</label>
                                </div>
                                <button type="button" @click="sendBid" :disabled="!showBidButton" class="btn btn-dark rounded-0 w-100 py-3">Подать заявку</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>

                <div class="az-stay-partners">
                    <div class="az-title d-flex my-5 text-center justify-content-center">
                        <hr class="col-1 bg-dark me-4">
                        <h3>Наши магазины</h3>
                        <hr class="col-1 bg-dark ms-4">
                    </div>
                    <ul class="nav nav-pills mb-3 justify-content-between " id="pills-tab" role="tablist">

                        <li class="nav-item col-3 text-center" role="presentation">
                            <a class="nav-link active az-nav-link fs-5 rounded-0" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">г.Ходжент</a>
                        </li>
                        <li class="nav-item col-3 text-center" role="presentation">
                            <a class="nav-link az-nav-link fs-5 rounded-0" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">г.Душанбе</a>
                        </li>
                        <li class="nav-item col-3 text-center " role="presentation">
                            <a class="nav-link az-nav-link fs-5 rounded-0" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Все
                                магазины</a>
                        </li>
                    </ul>
                    <div class="divider"></div>

                    <div class="tab-content mt-5" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <img src="/images/feeds.png" alt="" class="img-custom-shadow-start" width="511" height="321">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <p class="text-muted">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        </p>
                                        <nav>
                                            <h3 class="">
                                                Магазин AZAM “Худжанд”
                                            </h3>
                                            <nav class="nav flex-column">
                                                <span class="nav-link disabled px-0" tabindex="-1" aria-disabled="true">Адрес:
                                                    Улица Айни 14/2</span>
                                                <a class="nav-link link-light px-0" aria-current="page" href="tel:+9929233333">Телефон: 992 923 33 33 33</a>
                                                <a class="nav-link link-light px-0" href="tel:+992929951010">Контакты для сотрудничество: +992 929 95 10
                                                    10
                                                </a>
                                                <a class="nav-link link-light px-0" href="mailto:info@azam.tj">
                                                    E-mail: info@azam.tj
                                                </a>
                                            </nav>
                                        </nav>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <img src="/images/feeds.png" alt="" class="img-custom-shadow-start" width="511" height="321">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <p class="text-muted">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        </p>
                                        <nav>
                                            <h3 class="">
                                                Магазин AZAM “Душанбе”
                                            </h3>
                                            <nav class="nav flex-column">
                                                <span class="nav-link disabled px-0" tabindex="-1" aria-disabled="true">Адрес:
                                                    Улица Айни 14/2</span>
                                                <a class="nav-link link-light px-0" aria-current="page" href="tel:+9929233333">Телефон: 992 923 33 33 33</a>
                                                <a class="nav-link link-light px-0" href="tel:+992929951010">Контакты для сотрудничество: +992 929 95 10
                                                    10
                                                </a>
                                                <a class="nav-link link-light px-0" href="mailto:info@azam.tj">
                                                    E-mail: info@azam.tj
                                                </a>
                                            </nav>
                                        </nav>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="az-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3119.7835569145163!2d68.78648316854786!3d38.56180034380349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38b5d140f16aaaab%3A0xc3379b28f98a6386!2sAzam!5e0!3m2!1sen!2s!4v1609238006068!5m2!1sen!2s" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" width="100%" height="450" frameborder="0"></iframe>                </div>
                <div class="divider"></div>
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
        saleProducts: Array,
        patrtners: Array,
        sliders: Array,
    },
    data() {
        return {
            showBidButton: true,
            bid: {
                name: '',
                phone: '',
                city: '',
            }
        }
    },
    methods: {
        sendBid(){
            if (!(this.bid.name && this.bid.phone.length === 9 && this.bid.city)) {
                this.$swal({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Введите корректные данные',
                    showConfirmButton: true,
                    timer: 2000
                })
                return 0
            }

            this.showBidButton = false

            axios.post(route('partner-bid-save'), this.bid)
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
                this.showBidButton = true
            })
        }
    }
}
</script>
