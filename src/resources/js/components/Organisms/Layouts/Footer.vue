<template>
    <v-footer padless>
        <v-card flat tile class="blue-grey darken-1 white--text w-100 text-center">
            <v-card-text>
                <v-btn icon 
                    v-for="icon in icons" :key="icon.link" 
                    :href="icon.link" 
                    target="_blank" 
                    class="mx-4 white--text"
                >
                    <v-icon size="24px">{{ icon.name }}</v-icon>
                </v-btn>
            </v-card-text>

            <v-row class="w-100">
                <v-col cols="12" sm="4" class="px-0" v-for="item in items" :key="item.title">
                    <v-card-text class="white--text p-0">
                        <v-list dense dark class="blue-grey darken-1">
                            <v-subheader>{{ item.title }}</v-subheader>
                            <v-list-item v-for="(content, index) in item.contents" :key="content.text" :href="content.link" class="text-left">
                                <v-list-item-title>{{ content.text }}</v-list-item-title>
                            </v-list-item>
                        </v-list>
                    </v-card-text>
                </v-col>
             </v-row>

            <v-card-text class="white--text blue-grey darken-4">
                {{ new Date().getFullYear() }} — <strong>Amazone Japan, Inc.</strong>
            </v-card-text>
        </v-card>
    </v-footer>
</template>

<script>
export default {
    data () {
        return {
            icons: [
                {
                    name: 'mdi-facebook',
                    link: 'https://ja-jp.facebook.com/',
                }, {
                    name: 'mdi-twitter',
                    link: 'https://twitter.com/',
                }, {
                    name: 'mdi-instagram',
                    link: 'https://www.instagram.com/',
                }
            ],
            items: [
                {
                    title: 'Amazoneについて',
                    contents: [
                        {
                            text: 'Amazoneとは',
                            link: 'https://qiita.com/'
                        }, {
                            text: 'お知らせ',
                            link: 'https://qiita.com/'
                        }, {
                            text: 'FAQ',
                            link: 'https://qiita.com/'
                        }, {
                            text: 'お問い合わせ',
                            link: 'https://qiita.com/'
                        },
                    ]
                }, {
                    title: 'ご利用ガイド​',
                    contents: [
                        {
                            text: 'ショッピングヘルプ',
                            link: 'https://qiita.com/'
                        }, {
                            text: 'お支払い方法',
                            link: 'https://qiita.com/'
                        }, {
                            text: '安心・安全への取り組み',
                            link: 'https://qiita.com/'
                        },
                    ]
                }, {
                    title: 'お店を開こう',
                    contents: [
                        {
                            text: '無料出店のご案内​',
                            link: 'https://qiita.com/'
                        }, {
                            text: 'PayPay手数料0円で導入​',
                            link: 'https://qiita.com/'
                        },
                    ]
                }
            ], 
        }
    },
}
</script>