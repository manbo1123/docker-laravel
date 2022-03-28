<template>
    <v-row>
        <v-col class="px-0 hidden-sm-and-down" style="max-width: 220px;">
            <side-menu-component :parent-cat="parentCat" />
        </v-col>

        <v-col class="px-0 mx-2 text-center" style="width: calc(100vw - 220px);">
            <div class="py-5 mb-5 bg-white">
                <h3 class="mb-0">売れ筋商品​</h3>
                <a href="#" class="small">>もっと見る</a>
                <hot-items-component :shop-items="shopItems" />
            </div>

            <div class="py-5 mb-5 bg-white">
                <h3 class="mb-0">カテゴリー</h3>
                <a href="/category" class="small">>もっと見る</a>
                <category-carousel-component :parent-cat="parentCat" />
            </div>

            <div class="py-5 mb-5 bg-white">
                <h3 class="mb-0">新発売</h3>
                <v-row>
                    <v-col v-for="item in shopItems" :key="item.id">
                        <item-box-component :shop-item="item" />
                    </v-col>
                </v-row>
            </div>
        </v-col>
    </v-row>
</template>

<script>
export default {
    props: {
        parentCat: Array,
        shopItems: Array
    },
    components:{
        ItemBoxComponent: () => import('../Atoms/ItemBox'),
        SideMenuComponent: () => import('../Organisms/Layouts/SideMenu'),
        CategoryCarouselComponent: () => import('../Organisms/CategoryCarousel'),
        HotItemsComponent: () => import('../Organisms/HotItems'),
    },
};
</script>

<style>
a, a:hover {
    text-decoration: none;
}
.target_box:hover {
    border: 2px solid rgb(255, 235, 134) !important;
}
</style>
