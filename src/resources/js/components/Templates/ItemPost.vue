<template>
<div class="mx-auto" style="max-width: 900px;">
    <item-form-component :parentCat="parentCat" />
</div>
</template>
  
<script>
export default {
    props: {
        parentCat: Array
    },
    components:{
        ItemFormComponent: () => import('../Organisms/ItemForm'),
    }
};
</script>