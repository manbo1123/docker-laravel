<template>
    <div>
        <v-app-bar dark app height="80" color="blue-grey darken-4">
            <v-toolbar-title>
                <a href="/" class="text-white" style="text-decoration: none;">Amazone</a>
            </v-toolbar-title>
            <v-spacer></v-spacer>

            <div style="width: 100px; min-height: 48px;">
                <v-select solo small dense light 
                    :items="parentCat"
                    item-text="name"
                    item-value="id"
                    label="すべて"
                    hide-details="false" 
                    class="hidden-sm-and-down rounded-r-0"
                    background-color="grey lighten-3"
                    height="48"
                ></v-select>
            </div>

            <v-text-field solo flat light 
                label="何をお探しですか?"
                hide-details="false" 
                class="hidden-sm-and-down serch_box rounded-0"
            >
                    <template v-slot:append-outer>
                        <v-btn depressed large dense dark 
                            color="amber lighten-1"
                            height="48"
                            style="border-radius: 0 3px 3px 0;"
                        >
                            <v-icon>mdi-magnify</v-icon>
                        </v-btn>
                    </template>
                </v-text-field>

                <v-btn plain x-small
                    v-for="item in items" :key="item.text" 
                    :href="item.link"
                    class="hidden-sm-and-down header_btn h-100 text-decoration-none text-center"
                >
                    <v-icon>{{ item.icon }}</v-icon><br>
                    {{ item.text }}
            </v-btn>

            <v-app-bar-nav-icon plain
                v-if="$vuetify.breakpoint.smAndDown" 
                @click="drawer = !drawer"
                color="grey lighten-2">
            </v-app-bar-nav-icon>
        </v-app-bar>

        <v-navigation-drawer fixed temporary right v-model="drawer">
            <v-list nav dense>
                <v-list-item v-for="item in items" :key="item.text" :href="item.link">
                    <v-list-item-title>{{ item.text }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
    </div>
</template>

<script>
export default {
    data() {
        return {
            drawer: false,
            items: [
                {
                    icon: 'mdi-cart-outline',
                    text: 'カート',
                    link: 'https://qiita.com/',
                }, {
                    icon: 'mdi-heart',
                    text: 'お気に入り',
                    link: 'https://qiita.com/',
                }, {
                    icon: 'mdi-clock-check-outline',
                    text: '注文履歴',
                    link: 'https://qiita.com/',
                }, {
                    icon: 'mdi-account-circle',
                    text: 'マイページ',
                    link: 'https://qiita.com/',
                }, 
            ],
        }
    },
    props: {
        parentCat: Array
    }
};
</script>
 
<style>
.serch_box .v-input__append-outer {
    margin: 0 !important;
}

.header_btn .v-btn__content {
    display: block !important;
}
</style>