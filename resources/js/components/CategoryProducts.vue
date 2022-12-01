<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title" style="float:left">Category Products</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>

                                        <span v-for="(item, index) in records" :key="index" class="cat-tree" id="parent">
                                            <CategoryTree
                                                v-bind="{
                                            name: item.name,
                                            products: item.products,
                                            children: item.children,

                                          }"
                                            />
                                        </span>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CategoryTree from "./CategoryTree";

    export default {
        components: {
            CategoryTree
        },
        mounted() {
            this.getProducts();
        },
        data() {
           return {
               records:[]
           }
        },
        methods: {
            getProducts() {
                var url = '/api/category/getCategoryProducts';
                axios({
                    method: 'get',
                    url: url
                }).then( function (response) {
                    this.records = response.data;

                }.bind(this));
            }
        }
    }
</script>
<style>
    .cat-tree {
        padding-left: 16px;
        margin: 6px 0;

    }

    #parent {
        font-weight: bold;
    }
</style>
