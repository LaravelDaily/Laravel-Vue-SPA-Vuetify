<template>
<v-app>
    <Snackbar />
    <Header></Header>
    <router-view class="full-height"></router-view>
    <Footer></Footer>

</v-app>
</template>

<script>
import Header from './Header'
import Footer from './Footer'
import Snackbar from "./Snackbar";

export default {
    name: 'App',
    components: {
        Header,
        Footer,
        Snackbar
    }
}
</script>

<style scoped>
.full-height {
    height: 100%;
}
</style>
