<template>
<div class="subCategory">
    <span class="category-tree">{{ name }}</span>
    <div class="subCategoryForDisplay" v-if="children.length">
        <span v-for="(item, index) in children" :key="index">
            <category-tree
                v-bind="{
                    name: item.name,
                    children: item.children,
                    products: item.products
                }"
            />
        </span>

    </div>
    <div class="productDisplay"  v-if="products.length">
        <span class= "col-md-3" v-for="(item, index) in products" :key="index">
            <category-tree
                v-bind="{
                    name: item.name,
                    price: item.price
                }"
            />
        </span>
    </div>
</div>
</template>
<script>
    export default {
        name: "category-tree",
        props: {
            name: {
                type: String,
                required: true,
            },
            products : {
                type: Array,
                default: () => ({})
            },
            children: {
                type: Array,
                default: () => ({})
            },
        },
    };
</script>
<style>
    .productDisplay {
        color: red;
    }
    .subCategory {
        margin-left : 20px;
    }
    .productDisplay {
        display: flex;
        flex-wrap: wrap;
    }

</style>
