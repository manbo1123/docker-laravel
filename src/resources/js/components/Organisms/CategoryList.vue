<template>
    <div class="p-5">
        <h3>カテゴリー一覧</h3>
        <v-expansion-panels accordion>
            <v-expansion-panel v-for="(category, index) in categories" :key="index">
                <v-expansion-panel-header>
                    <img 
                        :src="'/storage/cat_img/' + category[0].parent_cat.icon" 
                        height="30" 
                        class="mr-1"
                        style="max-width: 30px;"
                    >
                    {{ category[0].parent_cat.name }}
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                    <div class="d-flex flex-wrap">
                        <v-btn rounded depressed 
                            v-for="cat in category" :key="cat.id"
                            :href="'/category/' + cat.parent_cat.id + '/'+ cat.id" 
                            color="amber lighten-3" 
                            class="m-2 text-nowrap"
                            style="border: 1px solid gray !important;"
                        >
                            {{ cat.name }}
                        </v-btn>
                    </div>
                </v-expansion-panel-content>
            </v-expansion-panel>
        </v-expansion-panels>
    </div>
</template>

<script>
export default {
    props: {
        categories: Object,
    }
}
</script>