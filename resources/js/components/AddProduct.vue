<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title" style="float:left">Add Product</h4>
                        </div>
                        <div class="card-body">
                            <input class="form-control custom" type="text" name="name" v-model="name" placeholder="Product Name" />
                            <input class="form-control custom" type="text" name="price" v-model="price" placeholder="Price" />
                            <multiselect class="custom" v-model="active" deselect-label="Can't remove this value" track-by="name" label="name" placeholder="Set Product Active" :options="options" :searchable="false" :allow-empty="false">
                                <template slot="singleLabel" slot-scope="{ option }"></template>
                            </multiselect>
                            <multiselect class="custom" v-model="categories" :options="records" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Select categories" label="name" track-by="name" :preselect-first="true">
                                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template>
                            </multiselect>

                            <button class="btn btn-black tableForm custom" v-on:click="addProduct">Add</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    Vue.component('multiselect', Multiselect)
    export default {

        components: {
            vSelect: window["vue-select"]
        },
        mounted() {
            this.getCategories();
        },
        data() {
            return {
                options: [
                    { name: 'yes', value : 1 },
                    { name: 'no', value : 0 }
                ],
                records:[],
                name : '',
                price : '',
                categories: [],
                active : ''
            }
        },
        methods: {
            getCategories() {
                var url = '/api/category/getCategoryList';
                axios({
                    method: 'get',
                    url: url
                }).then( function (response) {
                    this.records = response.data;

                }.bind(this));
            },
            addProduct() {
                if (this.name == '') {
                    alert ("please enter name");
                } else if (this.price == '') {
                    alert("Please enter price");
                } else if (this.active == '') {
                    alert("Please enter is active");
                } else if (this.categories.length  == 0) {
                    alert("Please select categories");
                } else {
                    var url = '/api/product/createProduct';
                    axios({
                        method: 'post',
                        url: url,
                        params: {
                            name: this.name,
                            price: this.price,
                            categories: this.categories,
                            active: this.active

                        },
                    }).then( function (response) {
                        var status =  response.data.status;

                        if (status == 200) {
                            this.name = '';
                            this.price = '';
                            this.active = '';
                            this.categories = [];
                            alert("Product created");
                        }

                    }.bind(this));
                }

            },
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
    .custom {
        margin-top: 10px;
    }
</style>

