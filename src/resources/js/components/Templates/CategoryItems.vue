<template>
    <v-row>
        <v-col class="px-0 hidden-sm-and-down" style="max-width: 220px;">
            <side-menu-component :parent-cat="parentCat" />
        </v-col>

        <v-col class="px-0 mx-2 text-center" style="width: calc(100vw - 220px);">
            <div v-if="Items.length === 0">
                販売中の商品はありません
            </div>
            <div v-else class="py-5 mb-5 bg-white">
                <v-row>
                    <v-col v-for="item in Items" :key="item.id">
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
        Items: Array
    },
    components:{
        ItemBoxComponent: () => import('../Atoms/ItemBox'),
        SideMenuComponent: () => import('../Organisms/Layouts/SideMenu'),
    }
}
</script>