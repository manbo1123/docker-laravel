<template>
    <v-sheet>
        <v-list color="transparent">
            <v-list-item>
                <v-list-item-content>
                    <h5 class="w-100 text-secondary" style="border-bottom: 1px solid gray;">News</h5>
                    <v-list-item-title 
                        v-for="news in newsList" :key="news"
                        class="py-2" 
                        style="font-size: 12px;"
                    >{{ news }}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item>
                <v-list-item-content>
                    <h5 class="w-100 text-secondary" style="border-bottom: 1px solid gray;">Category</h5>
                    <a v-for="cat in parentCat" :key="cat.name" 
                        :href="'/category/' + cat.id" 
                        class="cat_link py-2 text-secondary" 
                        style="font-size: 12px;"
                    >
                        <img :src="'/storage/cat_img/' + cat.icon" height="30" width="30">
                        {{ cat.name }}
                    </a>
                    <a href="/category" class="text-right small">>もっと見る</a>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-sheet>
</template>

<script>
export default {
    props: {
        parentCat: Array,
    },
    data() {
        return {
            newsList: [
                '50%OFF以上の商品', 
                '日替わりクーポン'
            ]
        }
    }
};
</script>

<style>
.cat_link:hover {
    background-color: rgb(252, 246, 230);
}
</style>