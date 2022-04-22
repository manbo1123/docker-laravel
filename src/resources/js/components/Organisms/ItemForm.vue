<template>
<div class="p-5">
    <h3>商品の登録編集</h3>
    <v-form lazy-validation ref="form" method="post" action="/" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="csrf">

        <v-text-field required 
            label="商品名" 
            name="name" 
            :counter="100"
            :value="item.name" 
        ></v-text-field>

        <v-textarea required 
            label="商品情報" 
            name="content" 
            :counter="2000"
            :value="item.content" 
            rows="10"
        ></v-textarea>

        <v-text-field required 
            label="送料" 
            name="postage" 
            :counter="100"
            :value="item.postage" 
        ></v-text-field>

        <v-text-field required 
            label="価格" 
            name="price" 
            :counter="7"
            :value="item.price" 
        ></v-text-field>

        <v-select return-object 
            :items="parentCat"
            item-text="name"
            item-value="id"
            label="親カテゴリー" 
            v-model="getParent" 
            @change="onChange(getParent.id, $event)"
        ></v-select>
        <v-select 
            v-if='catChildren' 
            name="category" 
            :items="catChildren"
            item-text="name"
            item-value="id"
            label="カテゴリー" 
        ></v-select>

        <div id="upload" 
            @dragenter="dragEnter"
            @dragleave="dragLeave"
            @dragover.prevent 
            @drop.prevent="uploadFile($event)"
            :class="{enter: isEnter}"
            class="drop_area"
        >
            <label class="w-100 h-100 m-0 d-flex align-items-center justify-content-center">
                <div id="upload_img">
                    <input 
                        v-for="n in imgCount" :key="n"
                        type="file" 
                        name="item_img[]" 
                        @change="uploadFile($event)" 
                        accept="image/*"
                        class="d-none">
                </div>
                <div class="text-center">
                    <v-icon x-large>mdi-cloud-upload-outline</v-icon>
                    <p class="m-0 text-center small">
                        画像を選択<br>またはドラッグ＆ドロップ
                    </p>
                </div>
            </label>
        </div>

        <div class="w-100 d-flex flex-wrap my-3">
            <div v-for="(file, index) in uploadedImage" :key="index" 
                @click="deleteFile(index)" 
                class="position-relative m-1"
            >
                <span class="delete-mark text-secondary">×</span>
                <img :src="file" width=70 height=70>
            </div>
        </div>

        <v-btn block 
            type="submit" 
            :disabled="!valid" 
            @click="validate"
            color="amber lighten-2" 
            class="mr-4" 
            elevation="0"
        >
            登録する
        </v-btn>
    </v-form>
</div>
</template>

<script>
export default {
    props: {
        parentCat: Array,
    },
    data() {
        return {
            item: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            valid: true,
            getParent: null,
            catChildren: null,
            isEnter: false,
            uploadedImage: [],
            imgCount: 1,
        }
    },
    methods: {
        validate () {
            this.$refs.form.validate()
        },
        onChange(id, event) {
            this.catChildren = null;
            axios.get('/category/getChildren/' + id).then(function(responce) {
                this.catChildren = responce.data;
            }.bind(this)).catch(function(error) {
                console.log('カテゴリーを取得できませんでした');
            });
        },
        dragEnter() {    // ドラッグエリア内に入った時
            this.isEnter = true;
        },
        dragLeave() {    // ドロップエリア外に出た時
            this.isEnter = false;
        },

        uploadFile(e) {
            let fileList = e.target.files ? e.target.files : e.dataTransfer.files;

            if (this.uploadedImage.length > 9) {
                alert('登録できる画像は、10枚までです');
            } else if (fileList.length === 1 && 
                (fileList[0].type === "image/png" || fileList[0].type === "image/jpeg")) {
                this.previewImage(fileList[0]);
                document.getElementById('upload_img').lastElementChild.files = fileList;
                this.imgCount += 1;
            } else if (fileList.length > 1) {
                alert('1枚ずつ選択してください');
            } else {
                alert('png、jpeg形式の画像ファイルを選択してください');
            }
            this.isEnter = false;
        },
        previewImage(file) {    // 画像プレビュー
            let reader = new FileReader();
            reader.onload = (e) => {
                this.uploadedImage.push(e.target.result);
            };
            reader.readAsDataURL(file);
        },
        deleteFile(index) {
            document.getElementById('upload_img').children[index].remove();
            this.uploadedImage.splice(index, 1);
        },
    }
}
</script>

<style>
.drop_area {
    border: 1px dashed gray;
    height: 100px;
}
.enter {
    background-color: #EEEEEE;
    border: 1px solid orange;
}
.delete-mark {
    position: absolute;
    top: 0;
    right: 0;
    cursor : pointer;
}
.delete-mark:hover {
    color: black !important;
}
</style>