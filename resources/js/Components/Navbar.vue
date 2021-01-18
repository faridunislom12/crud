<template>
    <section id="header">
            <div class="top-bar container-fluid bg-dark">
                <div class="container">
                    <div class="row justify-content-between text-white">
                        <div class="col-6">Режим работы: Понедельник - Суббота </div>
                        <div class="col-6 text-end">
                            Тел.: <a href="tel:+992933223333" class="text-decoration-none text-white">933 22 33 33</a>
                            Email: <a href="mailto:info@azam.tj" class="text-decoration-none text-white">info@azam.tj</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <nav class="navbar navbar-expand-lg navbar-light bg-white py-4" aria-label="Eighth navbar example">
                    <div class="container">
                        <a class="navbar-brand" :href="route('home')">
                            <img src="/images/logo.svg" alt="" srcset="">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarsExample07">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item active">
                                    <a :class="`nav-link ${route().current('home') ? 'active' : ''}`" :href="route('home')">Главная</a>
                                </li>
                                <li class="nav-item">
                                    <a :class="`nav-link ${route().current('repairs') ? 'active' : ''}`" :href="route('repairs')">Ремонт</a>
                                </li>
                                <li class="nav-item">
                                    <a :class="`nav-link ${route().current('about') ? 'active' : ''}`" :href="route('about')">О нас</a>
                                </li>
                                <li class="nav-item">
                                    <a :class="`nav-link ${route().current('mass-media') ? 'active' : ''}`" :href="route('mass-media')">СМИ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Контакты</a>
                                </li>
                            </ul>
                            <form class="me-4">
                                <div class="input-group">
                                    <input class="form-control" type="search" placeholder="Поиск" aria-label="Search">
                                    <span class="input-group-text bg-danger border-0">
                                        <img src="/images/icons/search.svg" alt="">
                                    </span>
                                </div>
                            </form>
                            <div class="">
                                <a href="http://" class="text-decoration-none fw-bold text-dark mx-2">
                                    <span class="me-3">
                                        Выход
                                    </span>
                                    <button type="button" class="btn btn-danger position-relative rounded-circle az-icon-head">
                                        <img src="/images/icons/user.svg" alt="" srcset="">
                                    </button>
                                </a>
                                <button type="button" class="btn btn-danger position-relative rounded-circle az-icon-head">
                                    <img src="/images/icons/cart.svg" alt="" srcset=""><span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-white text-dark">1<span class="visually-hidden">unread messages</span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </section>
</template>
