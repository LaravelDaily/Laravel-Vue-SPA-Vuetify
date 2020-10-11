<template>
<div>
    <v-card-text class="text-h4 text-center">Posts</v-card-text>
    <v-col justify="start" align="center" class="mx-1 my-1 px-1 py-1">
        <v-col x-small="12" sm="10" md="10" lg="7" xl="6" class="px-0 py-0 mx-0 my-0">

            <!--new post textfield-->
            <v-card v-if="!loading" class="mx-1 my-2 px-3 py-1 mb-10" color="grey lighten-4">
                <v-row class="mx-0 mt-3">
                    <v-textarea v-model="text" :error-messages="textError" background-color="white" auto-grow outlined rows="5" row-height="15" color="green lighten-1">
                        <template v-slot:label>
                            <div>
                                What's on your mind?
                            </div>
                        </template>
                    </v-textarea>
                </v-row>
                <v-row class="mx-1 mt-0 mb-2">
                    <v-btn color="green lighten-2" small @click="sharePost">Share</v-btn>
                    <v-btn v-if="!textAreaIsEmpty" color="white" class="mx-3" small @click="cancelPost">Cancel</v-btn>
                </v-row>
            </v-card>

            <!--Skeleton Loaders when loading posts-->
            <div v-if="loading">
                <v-card v-for="index in 5" :key="index" class="mx-1 my-2 d-flex flex-row justify-start align-start">
                    <v-sheet class="sheet">
                        <v-skeleton-loader class="mx-auto" type="avatar, list-item-two-line"></v-skeleton-loader>
                    </v-sheet>
                </v-card>
            </div>

            <!--Posts loaded from api-->
            <v-card v-for="post in posts" class="mx-1 my-2">
                <v-row class="mx-0 px=0 pt-2">
                    <v-icon class="py-0 mx-3">
                        mdi-account
                    </v-icon>
                    <v-card-title class="py-0 px-0 text-body-1 text-left">
                        {{ post.author }}
                    </v-card-title>
                </v-row>
                <v-row class="mx-0 px=0">
                    <v-card-text class="py-0 text-caption grey--text text-left">
                        {{ post.time }}
                    </v-card-text>
                </v-row>

                <v-card-text class="body-2 black--text text-left">{{post.text}}</v-card-text>
            </v-card>
        </v-col>

    </v-col>
</div>
</template>

<script>
export default {
    data() {
        return {
            products: {},
            posts: [],
            loading: true,
            posting: false,
            text: "",
            //set author as guest for now
            author: "Guest",
            textError: ""
        }
    },
    mounted() {
        this.loadPosts();
    },
    methods: {
        loadPosts() {
            axios.get('/api/posts')
                .then(response => {
                    console.log(response.data);
                    this.posts = response.data;
                    this.loading = false
                });
        },
        cancelPost() {
            this.text = "";
        },
        sharePost() {
            //post to api
            if (this.text == '') {
                this.textError = "*post can not be empty"
                return;
            } else {
                this.textError = ""
            }
            var payload = {
                text: this.text,
                author: this.author
            }
            axios
                .post('/api/products', payload)
                .then(res => {
                    // if successful then show snackbar, reload posts
                    let payload = {
                        text: "Post shared successfully",
                        timeout: 5000
                    };
                    this.$store.commit("showSnackbar", payload);

                })
                .catch(err => {
                    // if successful then show snackbar, reload posts
                    let payload = {
                        text: "Error! Try again.",
                        timeout: 5000
                    };
                    this.$store.commit("showSnackbar", payload);
                });
        }
    },
    computed: {
        textAreaIsEmpty() {
            return !this.text | this.text == ""
        }
    }
}
</script>

<style scoped>
.white-back {
    background-color: white;
}

.sheet {
    flex: 1;
    justify-self: start;
    display: flex;
}

.sheet div {
    margin: 0 !important;
    padding-left: 10px;
    padding-top: 10px;
    width: 100%;
    text-align: justify;
}
</style>
