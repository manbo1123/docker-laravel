<template>
    <div class="m-4">
        <div class="d-flex align-items-center" style="border-bottom: 1px solid gray;">
            <h2 class="m-0 mr-4">{{ shop.name }}</h2>
            <a href="#">{{ shop.name }}の取扱い商品</a>
        </div>

        <v-row>
            <v-col class="px-0 hidden-sm-and-down" style="max-width: 220px;">
                <side-menu-component :parent-cat="parentCat" />
            </v-col>

            <v-col class="px-0 mx-2" style="width: calc(100vw - 220px);">
                <div class="py-5 mb-5 bg-white">
                    {{ shop.shop_info.content }}

                    <v-data-table hide-default-header hide-default-footer 
                        :headers="headers"
                        :items="shop_data"
                    ></v-data-table>
                </div>

                <v-tabs align-with-title v-model="tab">
                    <v-tabs-slider color="amber"></v-tabs-slider>
                    <v-tab v-for="tab in tabMenu" :key="tab.menu">
                        <a v-if="tab.menu === '取扱い商品'" 
                            :href="'/shop/' + shop.id + '/item'" 
                            class="text-secondary" 
                        >{{ tab.menu }}</a>
                        <span v-else>{{ tab.menu }}</span>
                    </v-tab>
                </v-tabs>

                <v-tabs-items v-model="tab">
                    <v-tab-item v-for="tab in tabMenu" :key="tab.menu">
                        <v-card flat>
                            <v-card-text v-if="tab.menu ==='レビュー'" style="white-space: pre-line;">
                                <p class="mb-0" style="color: orange;">★★★☆☆</p>
                                <p class="mb-0">郵便局配送でしたが丁寧でした。</p>
                                <p class="mb-0">評価者：hogehoge、日付：2022/03/25</p>
                            </v-card-text>
                            <v-card-text v-else v-text="tab.content" style="white-space: pre-line;"></v-card-text>
                        </v-card>
                    </v-tab-item>
                </v-tabs-items>
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    props: {
        parentCat: Array,
        shop: Object,
        holiday: String
    },
    data() {
        return {
            headers: [
                {text: '', align: 'start', value: 'name'},
                {text: 'ショップ情報', value: 'val'},
            ],
            shop_data: [
                {
                    name: '電話番号',
                    val: this.shop.shop_info.tel,
                }, {
                    name: '住所',
                    val: '〒 ' + String(this.shop.shop_info.post_code).substring(0, 3) 
                          + '-' +  String(this.shop.shop_info.post_code).substring(3, 7) 
                          + ', ' + this.shop.shop_info.address,
                }, {
                    name: 'URL',
                    val: this.shop.shop_info.url,
                }, {
                    name: '営業時間',
                    val: this.shop.shop_info.open.substring(0, 5) + ' - ' + this.shop.shop_info.close.substring(0, 5),
                }, {
                    name: '定休日',
                    val: this.holiday,
                }
            ],
            tab: null,
            tabMenu: [
                {
                    menu: 'レビュー',
                    content: 'aaaa',
                }, {
                    menu: '返品・保証',
                    content: `適用される可能性があるその他のポリシーに関する情報については、Amazone.co.jp返品ポリシーをご覧ください。または、コンタクトレンズ通販 レンズファインにお問い合わせください。
                              この出品者に連絡する お問い合わせ先電話番号:012-088-7188
                              商品を返品される場合は、Amazoneのオンライン返品センターを開いて、出品者に返品承認をリクエストしてください。
                              Amazone マーケットプレイス保証
                              Amazone.co.jpのショッピングカートを通した商品のご注文は、Amazoneマーケットプレイス保証によって保護されています。お客様にはAmazone.co.jpに代金をお支払いいただきます。Amazone.co.jpはこの代金を出品者に自動的に送金いたします。つまり、お客様が直接出品者にお支払いになる必要はありません。Amazone.co.jpマーケットプレイス保証は、商品の配送中およびお届け時の状態の両方について保証します。`,
                }, {
                    menu: '配送',
                    content: `■ご注文内容により、日本郵便（ゆうパック、ゆうパケット）またはメーカー直送（ヤマト運輸・佐川急便・日本郵便が提供する宅配やメール便）のいずれかにてお届けいたします。

                              ※Amazone.co.jpの仕様により、Amazone.co.jpが提供するサービス内で表示される配送業者が実際と異なる場合がございます。
                              ※配送業者の指定はできません。
                              ※配達日時指定はできません。
                              ※配送は日本国内のみとさせて頂きます。
                              ※発送後の紛失、延着の補償はございません。
                              ※送料無料商品をご注文いただいても、離島等、一部地域へお届けする場合、配送料や追加送料をいただく場合がございます。
                              ※当店からお送りする「ゆうパケット」の一部は、ヤマト運輸のメール便でお届けする場合がございます。

                              ＜メーカー直送について＞
                              各メーカーの指定する配送業者のサービス（メーカー直送）でお届けする場合もございます。
                              メーカー直送の場合、各メーカーの配送基準に基づくため、配送業者や送り状番号（お問合せ番号）のご案内はいたしかねます。

                              ＜ゆうパケット等メール便について＞
                              専用封筒にてポスト投函でお届けしますが、ポストに入らなかった場合は直接お手渡しいたします。ご不在の場合は商品を配達店へ持ち帰り、7日間（不在保管期間）お預かりします。予めご了承ください。

                              【長期不在や住所不備で商品がお受け取りできない場合】
                              長期不在・住所不明・受け取り拒否等、お客様都合により商品をお受け取りいただけず、当店へ商品が返送された場合、当店にてご注文をキャンセル致します。
                              尚、送料の有無にかかわらず返送手数料として一律660円（税込）をご請求することがございます。予めご了承ください。`,
                }, {
                    menu: 'ヘルプ',
                    content: 'クレジットカードに対する請求に関するご質問については、Amazoneに連絡にお問い合わせください。',
                }, {
                    menu: '取扱い商品',
                    content: '',
                },
            ],
        }
    },
    components: {
        SideMenuComponent: () => import('./Layouts/SideMenu'),
    },
};
</script>
