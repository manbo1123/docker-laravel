<template>
<div>
    <shop-form-component 
        :shop="shop" 
        :holiday="holiday" />
</div>
</template>

<script>
export default {
    props: {
        shop: Object,
        holiday: Array
    },
    components:{
        ShopFormComponent: () => import('../Organisms/ShopForm'),
    }
};
</script>