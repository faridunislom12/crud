import {swal} from "vue-swal/src";

require('./bootstrap');
require('moment');

//manually
// require('./dashkit');
// require('./abuamr');

import Vue from 'vue';
import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import VueSwal from 'vue-swal'
import 'bootstrap';
import vSelect from 'vue-select'
import VueGoodTablePlugin from 'vue-good-table';
import Multiselect from 'vue-multiselect'

import 'vue-good-table/dist/vue-good-table.css'
import 'vue-select/dist/vue-select.css';

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(VueGoodTablePlugin);
Vue.use(VueSwal)
Vue.use(VueGoodTablePlugin);


Vue.component('multiselect', Multiselect)
Vue.component('v-select', vSelect)

Vue.mixin({ methods: { route } });

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
