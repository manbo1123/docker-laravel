<template>
    <v-sheet class="text-center mx-auto bg-secondary" max-width="1000">
        <v-slide-group show-arrows v-model="model">
            <v-slide-item v-for="cat in parentCat" :key="cat.name" class="target_box">
                <v-card link 
                    :href="'/category/' + cat.id"
                    height="200" width="200" 
                    class="ma-4" 
                >
                    <v-img 
                        height=150 width=150 
                        :src="'/storage/cat_img/' + cat.icon" 
                        class="mx-auto"
                    ></v-img>
                    <v-card-text class="p-0 px-1">{{ cat.name }}</v-card-text>
                </v-card>
            </v-slide-item>
        </v-slide-group>
    </v-sheet>
</template>

<script>
export default {
    props: {
        parentCat: Array,
    },
    data() {
        return {
            model: null
        }
    },
};
</script>