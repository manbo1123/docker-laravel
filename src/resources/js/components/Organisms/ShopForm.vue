<template>
<div class="p-5">
    <h3>ショップ情報の編集</h3>
    <v-form lazy-validation ref="form" method="post" action="/shop/3">
        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="_method" value="PUT">

        <v-text-field required label="ショップ名" name="name" 
            :counter="30"
            :rules="nameRules" 
            :value="shop.name" 
        ></v-text-field>

        <!-- <v-text-field required label="メールアドレス" name="email" 
            :counter="30"
            :rules="emailRules" 
            :value="shop.email" 
        ></v-text-field>
        -->

        <v-text-field required label="郵便番号" name="post_code" 
            :counter="15"
            :value="shop.shop_info.post_code" 
        ></v-text-field>

        <v-text-field required label="住所" name="address" 
            :value="shop.shop_info.address" 
        ></v-text-field>

        <v-textarea required label="紹介文" name="content" 
            :counter="2000"
            :value="shop.shop_info.content" 
        ></v-textarea>

        <v-text-field required label="URL" name="url" 
            :counter="200"
            :value="shop.shop_info.url" 
        ></v-text-field>

        <v-text-field required label="電話番号" name="tel" 
            :counter="15"
            :value="shop.shop_info.tel" 
        ></v-text-field>

        <p>定休日</p>
        <div class="d-flex">
            <div v-for="h in holidayList" :key="h">
                <v-checkbox :label="h" name="holiday[]" :value="h" 
                    v-model="holidaySelected"
                ></v-checkbox>
            </div>
        </div>

        <p>営業時間</p>
        <div class="d-flex">
            <vue-timepicker advanced-keyboard close-on-complete 
                :value="shop.shop_info.open" name="open" 
                hour-label="時"
                minute-label="分"
                drop-direction="down"
                input-class="form-control"
                input-width="100px"
            ></vue-timepicker>
            <p> - </p>
            <vue-timepicker advanced-keyboard close-on-complete 
                :value="shop.shop_info.close" name="close" 
                hour-label="時"
                minute-label="分"
                drop-direction="down"
                input-class="form-control"
                input-width="100px"
            ></vue-timepicker>
        </div>

        <v-btn type="submit" :disabled="!valid" color="success" class="mr-4" @click="validate">
            更新する
        </v-btn>
    </v-form>
</div>
</template>

<script>
export default {
    props: {
        shop: Object,
        holiday: Array
    },
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            valid: true,
            nameRules: [
                v => !!v || 'ショップ名は必須です',
                v => (v && v.length <= 30) || 'ショップ名は30文字以内で入力してください'
            ],
            /*emailRules: [
                v => !!v || 'メールアドレスは必須です',
                v => /.+@.+\..+/.test(v) || 'メール形式で入力してください'
            ],*/
            holidayList: ['月', '火', '水', '木', '金', '土', '日'],
            holidaySelected: this.holiday,
        }
    },
    methods: {
        validate () {
            this.$refs.form.validate()
        }
    },
    components: {
        'vue-timepicker': VueTimepicker.default,
    }
}
</script>