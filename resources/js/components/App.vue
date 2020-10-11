<template>
<v-app>
    <Snackbar />
    <navbar></navbar>
    <router-view class="full-height"></router-view>
    <app-footer></app-footer>

</v-app>
</template>

<script>
import Navbar from './Navbar'
import Footer from './Footer'
import Snackbar from "./Snackbar";

export default {
    name: 'App',
    components: {
        'navbar': Navbar,
        'app-footer': Footer,
        Snackbar
    }
}
</script>

<style scoped>
.full-height {
    height: 100%;
}
</style>
