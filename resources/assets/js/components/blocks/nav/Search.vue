<template>
        <slot></slot>
</template>
<style>

</style>
<script type="text/javascript">

    export default{
         ready: function () {
             console.log('search is ready');
        },
        data(){
            return{
                visible: true,
                productCount: 0,
                sort_dir: null,
                page: 1,

            }
        },
        components:{

        },
        watch: {
            q(){
                console.log('Search dispatch setQuery');
                console.log(this.query);
                this.$dispatch('updateQuery', this.query);
            },
            sort(){
                console.log('Search dispatch setSort');
                this.$dispatch('updateQuery', this.query);
            },
            sort_dir(){
                console.log('Search dispatch setSortDir');
                this.$dispatch('updateQuery', this.query);
            },
            page(){
                console.log('Search dispatch setPage');
                this.$dispatch('updateQuery', this.query);
            },
            feed(){
                console.log('Search dispatch setFeed');
                this.$dispatch('updateQuery', this.query);
            },
        },
        computed:{
            sortNavText(){return this.sort_by},
            displayNavText(){return this.display},
            feedNavText(){return this.feed},
            productCount(){return 0 },
            pageCount(){return 0 },
            query(){
                return{
                q: this.q,
                sort_by: this.sort_by,
                sort_dir: this.sort_dir,
                page: this.page,
                feed: this.feed,
                }
            },


        },
        events: {
            'toggleSearch': function(){
                this.visible =! this.visible;
            },
            'clearSearch': function(){
                this.query = {q:''}
            },
            'fetchProducts': function(){
                this.fetchProducts();
            },

        },
        methods: {
            fetchProducts(){
                var resource = this.$resource('/api/product/');
                console.log('fetching products with current query parameters');

                resource.get(this.query).then(function (response) {
                    this.setProducts(response.data);
                    this.lock = false;
                }).bind(this);
            },
            setProducts(products){
                this.$dispatch('setProducts',products);
            },
            openLoginModal(){
                console.log('Login Modal Open');
                this.$dispatch('openLoginModal');
            },
            openRegisterModal(){
                console.log('Register Modal Open');
                this.$dispatch('openRegisterModal');
            },
            openWishlistModal(){
                console.log('Wishlist Modal Open');
                this.$dispatch('openRegisterModal');
            },
            sortByPrice(){
                console.log('Sorting by Price');
                this.sort_by = 'price';
                this.$dispatch('sortByPrice');
                this.$dispatch('updateSortBy','price');
            },
            sortByPopularity(){
                console.log('Sorting by Popularity');
                this.sort_by = 'popularity';
                this.$dispatch('sortByPopularity');
                this.$dispatch('updateSortBy','popularity');
            },
            displayList(){
                console.log('Display List');
                this.display = 'list';
                this.$dispatch('displayList');
                this.$dispatch('updateDisplay','list');
            },
            displayGrid(){
                console.log('Display Grid');
                this.display = 'grid';
                this.$dispatch('displayGrid');
                this.$dispatch('updateDisplay','grid');
            },
            queryAllSources(){
                console.log('Query all sources');
                this.feed = 'all';
                this.$dispatch('queryAllSources');
                this.$dispatch('updateSource',false);
            },
            queryAmazonSource(){
                console.log('Query amazon source');
                this.feed = 'amazon';
                this.$dispatch('queryAmazonSource');
                this.$dispatch('updateSource','amazon');
            },
            queryEbaySource(){
                console.log('Query ebay source');
                this.feed = 'ebay';
                this.$dispatch('queryEbaySource');
                this.$dispatch('updateSource','ebay');
            },
            queryEtsySource(){
                console.log('Query etsy source');
                this.feed = 'etsy';
                this.$dispatch('queryEtsySource');
                this.$dispatch('updateSource','etsy');
            },
        },
        props: {
            display: {default:'list'},
            feed: {default:null},
            q: {default:null},
            sort_by: {default:'price'},
        },
    }

</script>
