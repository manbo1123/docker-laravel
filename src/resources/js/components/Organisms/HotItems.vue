<template>
    <v-sheet class="text-center mx-auto" max-width="1000">
        <v-slide-group show-arrows v-model="model">
            <v-slide-item v-for="item in shopItems" :key="item.id" class="target_box">
                <v-card link tile 
                    :href="'/' + item.id"
                    height="140" width="120" 
                    class="ma-4" 
                >
                    <v-img 
                        :src="'/storage/item_img/' + item.item_imgs[0].name" 
                        height=80 
                        class="item_view" 
                    ></v-img>
                    <v-card-text class="font-weight-bold text-danger">{{ item.price }}円</v-card-text>
                </v-card>
            </v-slide-item>
        </v-slide-group>
    </v-sheet>
</template>

<script>
export default {
    props: {
        shopItems: Array
    },
    data() {
        return {
            model: null,
        }
    }
}
</script>