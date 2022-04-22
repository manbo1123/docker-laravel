<template>
    <v-container fluid>
        <div class="mb-5 p-2 bg-white">
            <div style="border-bottom: 1px solid gray;">
                <v-btn plain 
                    :href="'/shop/' + shopItem.shop.id" 
                    class="px-0 text-dark font-weight-bold"
                >
                    {{ shopItem.shop.name }}
                </v-btn>
            </div>

            <div class="text-right">
                <v-btn small plain 
                    :href="'/category/' + shopItem.category.parent_cat.id" 
                    class="p-0"
                >
                    {{ shopItem.category.parent_cat.name }}
                </v-btn>
                >
                <v-btn small plain 
                    :href="'/category/' + shopItem.category.parent_cat.id + '/' + shopItem.category.id" 
                    class="p-0"
                >
                    {{ shopItem.category.name }}
                </v-btn>
            </div>

            <v-row class="mb-5">
                <v-col cols="12" sm="6">
                    <v-img :src="hoverItem"></v-img>

                    <v-row justify="center" class="mt-3" >
                        <img v-for="(itemImg, index) in shopItem.item_imgs" :key="index"
                            @mouseover="mouseOver"
                            :src="'/storage/item_img/' + itemImg.name"
                            alt="item image"
                            class="item_img mr-1 h-100 p-0" 
                            style="width: 60px; height: 50px;">
                    </v-row>
                </v-col>

                <v-col cols="12" sm="6">
                    <h4 class="font-weight-bold">{{ shopItem.name }}</h4>

                    <div class="my-4">
                        <p style="border-bottom: 1px solid gray;">価格(税込)</p>
                        <v-card>
                            <v-card-title class="py-1">{{ shopItem.price }} 円</v-card-title>
                            <v-card-text> {{ shopItem.postage }}</v-card-text>
                        </v-card>
                    </div>

                    <div class="my-4">
                        <p style="border-bottom: 1px solid gray;">注文</p>

                        <div class="d-flex">
                            <v-text-field solo flat outlined dense
                                v-model="itemCount"
                                hide-details="false" 

                                class="mr-1 rounded-0"
                                style="max-width: 60px;"
                            ></v-text-field>

                            <v-btn rounded depressed 
                                @click="addCart(shopItem.id)" 
                                color="amber"
                                class="col mx-auto font-weight-bold text-dark"
                                style="max-width: 400px;"
                            >
                                カートに入れる
                            </v-btn>
                        </div>

                        <div class="my-2 d-flex justify-content-center">
                            <v-btn rounded depressed small 
                                @click="likePost(shopItem.id)" 
                                class="border mr-1 w-50
                            ">
                                <v-icon small 
                                    class="text-secondary"
                                    :class="{is_like: isLike}"
                                >mdi-heart</v-icon>
                                お気に入り追加
                            </v-btn>
                            <v-btn rounded depressed small class="border w-50">商品について質問する</v-btn>
                        </div>

                        <v-row class="mt-1">
                            <v-col v-for="btn in linksInPage" :key="btn.text" class="p-0">
                                <v-btn plain depressed :href="btn.link">
                                    <v-icon x-large>{{ btn.icon }}</v-icon><br>
                                    <small>{{ btn.text }}</small>
                                </v-btn>
                            </v-col>
                        </v-row>
                    </div>
                </v-col>
            </v-row>
        </div>

        <div id="item_info" class="mb-5 p-2 bg-white">
            <h5 style="border-bottom: 1px solid gray;">商品情報</h5>
            <p style="white-space: pre-line;">{{ shopItem.content }}</p>
        </div>

        <div class="mb-5 p-2 bg-white">
            <div class="mb-2" style="border-bottom: 1px solid gray;">
                <h5 style="border-bottom: 1px solid gray;" class="d-flex">
                    この商品のレビュー・口コミ
                    <p class="mx-5 my-0">
                        <span v-if="aveScore < 0.5" style="color: orange;">☆</span>
                        <span v-else-if="aveScore < 1.5" style="color: orange;">★</span>
                        <span v-else-if="aveScore < 2.5" style="color: orange;">★★</span>
                        <span v-else-if="aveScore < 3.5" style="color: orange;">★★★</span>
                        <span v-else-if="aveScore < 4.5" style="color: orange;">★★★★</span>
                        <span v-else style="color: orange;">★★★★★</span>
                        {{ aveScore }}
                    </p>
                    <p class="my-0 text-secondary">{{ reviews.length }}件のレビュー</p>
                </h5>

                <v-card tile
                    v-for="(review, index) in reviews" :key="review.user"
                    elevation="0"
                    class="mt-2"
                    :style="index === reviews.length - 1 ? '' : 'border-bottom: 1px solid gray;'" 
                >
                    <div class="d-flex align-items-center">
                        <v-icon>mdi-account-circle-outline</v-icon>
                        {{ review.user }} さん
                    </div>

                    <div>
                        <span v-if="review.score < 1" style="color: orange;">☆☆☆☆☆</span>
                        <span v-else-if="review.score < 2" style="color: orange;">★☆☆☆☆</span>
                        <span v-else-if="review.score < 3" style="color: orange;">★★☆☆☆</span>
                        <span v-else-if="review.score < 4" style="color: orange;">★★★☆☆</span>
                        <span v-else-if="review.score < 5" style="color: orange;">★★★★☆</span>
                        <span v-else style="color: orange;">★★★★★</span>
                        {{ review.score }}
                    </div>

                    <v-card-title class="py-0">{{ review.title }}</v-card-title>
                    <v-card-text>{{ review.content }}</v-card-text>
                </v-card>
            </div>
            <v-btn block depressed class="mb-5">商品レビューをもっと見る</v-btn>
        </div>

        <div id="qa_info" class="mb-5 p-2 bg-white">
            <div class="mb-2">
                <h5 style="border-bottom: 1px solid gray;">Q&A</h5>
                <p class="font-weight-bold">この商品に関する質問は以下からお問い合わせください。</p>
                <v-spacer></v-spacer>
                <p class="m-0">よくある質問</p>
                <ul>
                    <li>商品について詳しく知りたい</li>
                    <li>お届け日、発送日、送料が知りたい</li>
                    <li>在庫状況、再入荷状況が知りたい 等</li>
                </ul>
            </div>
            <v-btn block depressed class="mb-5">この商品について質問する</v-btn>
        </div>

        <div id="store_info" class="mb-5 p-2 bg-white">
            <div>
                <h5 style="border-bottom: 1px solid gray;">販売ストア</h5>
                <v-btn plain 
                    :href="'/shop/' + shopItem.shop.id" 
                    class="px-0 text-dark font-weight-bold"
                >
                    {{ shopItem.shop.name }}
                </v-btn>
                <p style="white-space: pre-line;">{{ shopItem.shop.shop_info.content }}</p>

                <v-row class="my-3 mx-auto" style="width: 290px;">
                    <v-date-picker multiple no-title 
                        locale="ja-jp" 
                        :day-format="date => new Date(date).getDate()"
                    ></v-date-picker>
                </v-row>
            </div>

            <v-btn block depressed :href="'/shop/' + shopItem.shop.id" class="mb-5">このストアの商品をもっと見る</v-btn>
        </div>
    </v-container>
</template>

<script>
export default {
    props: {
        shopItem: Object,
    },
    data() {
        return {
            hoverFlag: false,
            hoverItem: '/storage/item_img/' + this.shopItem.item_imgs[0].name,
            linksInPage: [
                {
                    text: '配送',
                    icon: 'mdi-truck',
                    link: '#item_info',
                }, {
                    text: 'Q&A',
                    icon: 'mdi-forum',
                    link: '#qa_info',
                }, {
                    text: '商品レビュー',
                    icon: 'mdi-star',
                    link: '#store_info',
                }
            ],
            reviews: [
                {
                    user: 'ほげほげ',
                    score: 3,
                    title: 'とても良いです。',
                    content: '引っ越しのために注文しました。段ボールはしっかりしていて、かつこのサイズは両手で抱えて持ちやすく沢山入ります。段ボールの硬さとサイズは大事です。意外に荷物が多く結局3回注文しました。また必要な時はこちらで注文しようと思います。おすすめです。'
                }, {
                    user: 'てすと太郎',
                    score: 5,
                    title: 'とても良いです。',
                    content: 'おすすめです。'
                }, {
                    user: 'hogehoge2022',
                    score: 1,
                    title: 'とても悪いです。。。',
                    content: 'とても悪いです。。。とても悪いです。。。とても悪いです。。。'
                },
            ],
            itemCount: 1,
            isLike: false,
        }
    },
    computed: {
        aveScore() {
            let total = 0;
            let reviews_list = this.reviews;
            let count = reviews_list.length;

            for(let i=0; i<count; i++) {
                total += reviews_list[i].score;
            }
            return (total / count).toFixed(1);
        },
    },
    methods: {
        mouseOver(e) {
            let imgUrl = e.target.getAttribute("src");
            this.hoverFlag = true
            this.hoverItem = imgUrl;
        },
        likePost(item) {
            axios.post(item + '/like').then(function(responce) {
                this.isLike = responce.data;
            }.bind(this)).catch(function(error) {
                console.log('お気に入り登録できませんでした');
            });
        },
        addCart(item) {
            let itemCount = {'count': this.itemCount};

            axios.post(item + '/add', itemCount).then(function(responce) {
                this.inCart = responce.data;
                console.log('カートに追加しました');
            }.bind(this)).catch(function(error) {
                console.log('カートに追加できませんでした');
            });
        }
    },
}
</script>

<style>
.item_img:hover {
    opacity: 0.4;
}

.is_like {
    color: #FF6666 !important;
}
</style>