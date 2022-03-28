<template>
    <div>
        <shop-info-component 
            :parent-cat="parentCat"
            :shop="shop"
            :holiday="holiday" />
    </div>
</template>

<script>
export default {
    props: {
        parentCat: Array,
        shop: Object,
        holiday: String
    },
    components:{
        ShopInfoComponent: () => import('../Organisms/ShopInfo'),
    }
};
</script>