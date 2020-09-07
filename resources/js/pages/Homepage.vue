<template>
    <v-row>

        <sidebar></sidebar>

        <v-col md="9" class="mt-3 mb-3">
            <v-row>
                <v-col v-for="product in products" :key="product.id" lg="4" md="6" class="mb-4">
                    <v-card class="h-100">
                        <a href="#"><v-img :src="product.photo" alt=""/></a>
                        <v-card-title>
                            <a href="#">{{ product.name }}</a>
                        </v-card-title>
                        <v-card-subtitle>
                            <h3>${{ product.price }}</h3>
                        </v-card-subtitle>
                        <v-card-text>{{ product.description }}</v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
    <!-- /.row -->

</template>

<script>
    import Sidebar from "../components/Sidebar";

    export default {
        data() {
            return {
                products: {}
            }
        },
        mounted() {
            axios.get('/api/products')
                .then(response => {
                    this.products = response.data.data;
                });
        },
        components: {
            'sidebar': Sidebar
        }
    }
</script>
