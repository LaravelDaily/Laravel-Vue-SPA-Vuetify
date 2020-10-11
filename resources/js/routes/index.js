import Homepage from '../pages/Homepage.vue'

export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Homepage,
        }
    ]
}
