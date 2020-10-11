<template>
<v-footer dark padless>
    <Dialog :show="privacy" title="Privacy Policy" description1="This is not a real website. It is a mock website for development and testing purposes." buttonLabel="I understand" @click="closePrivacy" />
    <Dialog :show="contactUs" title="Contact Us" description1="Email: tanzimshahriarfahim@gmail.com" description2="Phone:0470635918" buttonLabel="Close" @click="closeContactUs" />
    <v-card class="flex" flat tile>
        <v-card-title class="green lighten-1 py-2">
            <v-layout column align-center class="hidden-sm-and-up">
                <strong class="subheading">Get connected with us on social networks!</strong>
                <v-spacer></v-spacer>
                <v-layout row align-center>
                    <v-card-subtitle class="mx-4 my-0 py-0 px-0" v-for="(icon, i) in icons" :key="i">
                        <v-btn :href="icon.link" target="_blank" dark icon>
                            <v-icon size="24px">{{ icon.icon }}</v-icon>
                        </v-btn>
                    </v-card-subtitle>
                </v-layout>
            </v-layout>
            <v-layout align-center justify-center row class="hidden-xs-only">
                <strong class="subheading">Get connected to my socials!</strong>
                <v-card-subtitle v-for="(icon, i) in icons" :key="i" class="mx-4 my-0 py-0 px-0">
                    <v-btn :href="icon.link" target="_blank" dark icon>
                        <v-icon size="24px">{{ icon.icon }}</v-icon>
                    </v-btn>
                </v-card-subtitle>
            </v-layout>
            <v-layout align-center justify-end row>
                <v-btn x-small @click="showPrivacy" text class="mr-3">Privacy</v-btn>
                <v-btn x-small @click="showContactUs" text class="mr-3">Contact Me</v-btn>
            </v-layout>
        </v-card-title>
        <div class="footer-title">&copy; 2019 Clothing Shop</div>
    </v-card>
</v-footer>
</template>

<script>
import Dialog from "./Dialog";
export default {
    components: {
        Dialog
    },
    data: () => ({
        icons: [{
                icon: "mdi-github",
                link: "https://github.com/tanzimshahriar/"
            },
            {
                icon: "mdi-linkedin",
                link: "https://www.linkedin.com/in/tshahriar/"
            },
            {
                icon: "mdi-facebook",
                link: "https://www.facebook.com/tanzim012/"
            }
        ],
        privacy: false,
        tAndC: false,
        contactUs: false
    }),
    methods: {
        closePrivacy() {
            this.privacy = false;
        },
        closeTAndC() {
            this.tAndC = false;
        },
        closeContactUs() {
            this.contactUs = false;
        },
        showPrivacy() {
            this.privacy = true;
        },

        showTAndC() {
            this.tAndC = true;
        },
        showContactUs() {
            this.contactUs = true;
        }
    }
};
</script>

<style scoped>
* {
    font-size: 11px;
}

.link {
    color: white;
    padding-left: 8px;
    font-weight: lighter;
    cursor: pointer;
}

.subheading {
    font-size: 14px;
}

.footer-title {
    text-align: center;
}
</style>
