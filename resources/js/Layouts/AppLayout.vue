<template>
    <div>
        <Navbar />
        <slot></slot>
        <Footer />
    </div>
</template>


<script>
import Navbar from './../Components/Navbar'
import Footer from './../Components/Footer'

export default {
    components: {
        Navbar,
        Footer
    },

    data() {
        return {}
    },

    methods: {}
}
</script>
