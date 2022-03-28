<template>
    <v-card link 
        :href="'/' + shopItem.id" 
        height="200" width="200"
        class="item_box my-4 mx-auto text-left overflow-hidden" 
    >
        <v-img 
            :src="'/storage/item_img/' + shopItem.item_imgs[0].name" 
            height=120 
            class="item_view" 
        ></v-img>
        <v-card-title class="p-0 pl-1 font-weight-bold text-danger">
            {{ shopItem.price }}円
        </v-card-title>

        <v-card-text class="p-0 pl-1">
            <small>{{ shopItem.postage }}</small>
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    props: {
        shopItem: Object
    }
}
</script>

<style>
.item_box:hover .item_view {
    transform: scale(1.1, 1.1);
}
</style>