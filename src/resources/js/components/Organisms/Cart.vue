<template>
    <v-sheet class="mx-auto bg-white" max-width="1000">
        <v-card elevation="0">
            <v-card-title>ショッピングカート</v-card-title>

            <v-divider class="my-0 mx-4"></v-divider>

            <v-row v-for="(cartItem, index) in cartItems" :key="cartItem.id">
                <v-img 
                    height=120 width=120 
                    :src="'/storage/item_img/' + cartItem.item.item_imgs[0].name" 
                    class="mx-auto" style="max-width: 120px;"
                ></v-img>

                <v-col>
                    <v-card-title>{{ cartItem.item.name }}</v-card-title>
                    <v-card-text>
                        {{ cartItem.item.price * cartItem.count }}
                    </v-card-text>

                    <v-card-text>
                        <a :href="'/category/' + cartItem.item.category.parent_cat.id">
                            {{ cartItem.item.category.parent_cat.name }}
                        </a> 
                        > 
                        <a :href="'/category/' + cartItem.item.category.id">
                            {{ cartItem.item.category.name }}
                        </a>
                    </v-card-text>

                    {{ cartItem.count }}

                    <v-btn small plain 
                        @click="cartDestroy(cartItem.id, index)" 
                        class="p-0"
                    >
                        削除ボタン
                    </v-btn>
                </v-col>
            </v-row>

            <v-divider class="my-0 mx-4"></v-divider>

            <div class="text-right">
                <p calss="m-0">小計 (3 個の商品) (税込) : ￥49,996</p>
            </div>
        </v-card>
    </v-sheet>
</template>

<script>
export default {
    props: {
        cartItems: Array,
    },
    data() {
        return {
            cart: this.cartItems,
            // deleted: '',
        }
    },
    /*computed: {
        totalPrice() {
            return sum(itemPrice);
        }
    },*/
    methods: {
        cartDestroy(id, index) {
            $cartNew = this.cart;
            axios.delete('/mypage/cart/' + id).then(function(responce) {
                console.log(responce.data);
                $cartNew.splice(index, 1);
            }.bind(this)).catch(function(error) {
                console.log('商品を削除できませんでした');
            });
        },
    }
};
</script>