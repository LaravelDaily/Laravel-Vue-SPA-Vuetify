<template>
<div>
    <v-row>
        <v-snackbar bottom v-model="snackbar.visible" :timeout="snackbar.timeout" :multi-line="snackbar.multiline === true">
            {{ snackbar.text }}

            <v-btn small text @click="closeSnackbar">Close</v-btn>
        </v-snackbar>
    </v-row>
</div>
</template>

<script>
import {
    mapMutations
} from "vuex";
export default {
    computed: {
        snackbar() {
            return this.$store.state.snackbar;
        }
    },
    methods: {
        ...mapMutations(["closeSnackbar"])
    }
};
</script>

<style scoped>
#app>div>div:nth-child(1)>div>div>div>div.v-snack__content>button {
    float: right !important;
}
</style>
