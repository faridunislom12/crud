<template>
    <app-layout class="wrapper">
        <section id="content">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-5">
                        <li class="breadcrumb-item"><a :href="route('home')">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page">СМИ</li>
                    </ol>
                </nav>

                <div class="az-mass">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col" v-for="(item, index) in news" :key="index">
                            <div class="card h-100 border-0 bg-light">
                                <img :src="item.image['fileName'] ? '/storage/' + item.image['fileName'] : '/images/cean.svg'" class="card-img-top p-3" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ item.title }}</h5>
                                    <p class="card-text text-secondary" v-html="item.short_desc"></p>
                                </div>
                                <a :href="item.link || '#'" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="divider"></div>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout'
export default{
    components: {
        AppLayout
    },
    props: {
        news: Array,
    },
    data() {
        return {

        }
    },
    mounted() {
    },
    methods: {
    }
}
</script>
