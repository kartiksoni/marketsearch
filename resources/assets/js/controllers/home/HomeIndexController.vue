<template>
    <div id="HomeIndexController">
        <slot></slot>
    </div>
</template>

<script type="text/javascript">
    import NavSearch from '../../components/blocks/nav/Search.vue';
    import ProductResults from '../../components/blocks/product/Results.vue';
    import ModalLightbox from '../../components/blocks/modals/ProductLightbox.vue';
    import ModalLogin from '../../components/blocks/modals/Login.vue';
    import ModalSignup from '../../components/blocks/modals/Signup.vue';
    import ModalWishlist from '../../components/blocks/modals/Wishlist.vue';


    export default {
        components: {
            NavSearch,
            ProductResults,
            ModalLightbox,
            ModalLogin,
            ModalSignup,
            ModalWishlist,

        },
        ready: function () {
            console.log('HomeIndexController Ready')
        },
        filters: {},
        data(){
            return {
                query:{},
            };
        },
        computed: {

        },
        directives: {},
        events: {
            'updateQuery': function(query){
                console.log('HomeIndexController updateQuery');
                this.$broadcast('updateQuery',query);
            },
            'updateSortBy': function(sort_by){
                console.log('HomeIndexController updateSortBy');
                this.$broadcast('updateSortBy',sort_by);
            },
            'updateSource': function(source){
                console.log('HomeIndexController updateSource');
                this.$broadcast('updateSource',source);
            },
            'updateDisplay': function(display){
                console.log('HomeIndexController updateDisplay');
                this.$broadcast('updateDisplay',display);
            },
            'setProducts': function(products){
                this.$broadcast('setProducts',products);
            },
            'fetchProducts': function(){
                this.$broadcast('fetchProducts');
            },
            'clearSearch': function(){
                this.$broadcast('clearSearch');
            },
            'openLoginModal': function(val){
                this.$broadcast('openLoginModal',val);
            },
            'openProductLightbox': function(product){
                console.log('HomeIndexController broadcast openProductLightbox');
                this.$broadcast('openProductLightbox',product);
            },
            'addProductToWishlist': function(product){
                console.log('HomeIndexController addProductToWishlist');
                this.$broadcast('addProductToWishlist',product);
            },
            'goToProductPage': function(product){
                console.log('HomeIndexController goToProductPage');
                window.open(product.public_url,'_blank');
                console.log(product.public_url);
                this.$broadcast('goToProductPage',product);
            },
        },
        methods: {
            feedIsBitmaps(){
                return this.feed == 'bitmaps';
            },
            feedIsCollections(){
                return this.feed == 'collections';
            },
        },
        props: {
            user: {
                default: function(){return {}}
            }
        }


    }

</script>

