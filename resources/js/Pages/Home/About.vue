<template>
    <app-layout class="wrapper">
        <section id="content">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-5">
                      <li class="breadcrumb-item"><a :href="route('home')">Главная</a></li>
                      <li class="breadcrumb-item active" aria-current="page">О нас</li>
                    </ol>
                </nav>

                <div class="az-about" v-if="about != null || about != undefined">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <h1 class="line-height">{{ about.title }}</h1>
                            <p class="lh-lg my-5" v-html="about.short_desc"></p>
                        </div>
                        <div class="col-12 col-lg-6">
                            <img :src="about.image ? '/storage/' + about.image['fileName'] : '/images/no-photo-about.jpg'" alt="" class="rounded img-fluid">
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
        about: Object,
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
