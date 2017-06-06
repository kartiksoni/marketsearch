<template>
    <div id="ProductResults">
        <slot></slot>
    </div>
</template>
<style>

</style>
<script type="text/javascript">
    export default{
        ready: function () {
            this.fetchProducts();
            if(!this.display)
            {
//                init display
                this.display = 'list';

            }

        },
        components: {},
        directives: {},
        mounted: function () {


        },
        data(){
            return {
                products: false,
                lock: false,
                query: {
                    q: false,
                    page: 1,
                    per_page: 20,
                    sort_by: 'price',
                    sort_dir: 'asc',
                }
            }
        },
        computed: {
            resultCount: function(){
                return this.products.length;
            }
        },
        watch: {
            sort_by(){
                //Set the query sort by whenever the result sort by is updated
                this.query.sort_by = this.sort_by;
            },
            query(){

            },
        },
        events: {
            'updateQuery': function (query) {
                this.query = query;
                this.products = false;
                this.fetchProducts();
            },
            'updateDisplay': function (display) {
                console.log('Results updateDisplay:'+display);
                this.display = display;

                this.fetchProducts();
            },
            'updateSortBy': function (sort_by) {
                console.log('Results updateSortBy:'+sort_by);
                this.products = false;
                this.query.sort_by = sort_by;
                this.fetchProducts();
            },
            'updateSource': function (source) {
                console.log('Results updateSource:'+source);
                this.products = false;
                this.query.source = source;
                this.fetchProducts();
            },
        },

        props: {
            display: {default:'list'},
            feed: {default:null},
            q: {default:null},
            sort_by: {default:'price'},
        },
        watch: {
            products: function (value) {
                console.log('products changed');
            }
        },
        methods: {
            fetchProducts: function (collection) {
                console.log('fetching products');
                var resource = this.$resource('/api/product');
                console.log('fetching products ' + 'page:' + this.query.page);

                resource.get(this.query).then(function (response) {
                    if (!this.products) {
                        this.$set('products', response.data.data);
                    } else {
                        for (item in response.data.data) {
                            this.products.push(response.data.data[item]);
                        }
                    }
                    this.lock = false;
                }).bind(this);

            },
            addProductToWishlist: function(product)
            {
                console.log('Results addProductToWishlist');
                this.$dispatch('addProductToWishlist',product);
            },
            goToProductPage: function(product)
            {
                console.log('Results goToProductPage');
                this.$dispatch('goToProductPage',product);

            },
            openProductLightbox: function(product)
            {
                console.log('Results openProductLightbox');
                this.$dispatch('openProductLightbox', product);
            }

        },
    }

</script>
