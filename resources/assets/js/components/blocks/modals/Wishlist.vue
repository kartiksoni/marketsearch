<template>
    <div id="ComponentBlockModalWishlist">
        <slot></slot>
    </div>
</template>
<style>

</style>
<script type="text/javascript">

    import WishlistStore from '../../../models/WishlistStore.js';


    export default{
         ready: function () {
            console.log('ComponentBlockWishlist Ready')

             if (!this.products) {
                 this.$set('products', []);
             }
             this.fetchWishlist()

        },
        computed: {
             query: function(){
                 return{
                     products:this.products,
                     name:this.wishlistName,
                     id:this.wishlistId,
                     _token: Laravel.csrfToken,
                 }
             }
        },
        data(){
            return{
                wishlistId: false,
                selectorWishlist: false,
                selectedWishlist: false,
                wishlistName: '',
                wishlistNamerVisible: true,
                wishlistPickerVisible: true,
                wishlistPickerOptions: false,
                visible: false,
                products: false,
            }
        },
        watch:{
            selectorWishlist: function(){
                if(this.selectorWishlist == '')
                {

                }
                else if(this.selectorWishlist == 'new')
                {
                    this.newWishlist();
                    console.log('new selected');
                }
                else{
                    this.wishlistId = this.selectorWishlist;
                    console.log(this.wishlistId);
                    this.fetchWishlist();
                    console.log('specific wishlist selected');
                }
            }
        },
        props:{
            user: {
                default: function(){return {

                }}
            }
        },
        events: {
            'openWishlistModal': function(data){
                this.visible = true;
            },
            'addProductToWishlist': function(product){
                this.addProduct(product);
                this.visible = true;
            }
        },
        methods: {
            cacheProducts(products)
            {
                let data = {
                    products: products,
                    id: this.selectedWishlist.id,
                }
                WishlistStore.save(data);

            },
            closeModal(){
                console.log('closingWishlistModal');
                this.$dispatch('closingModal');
                this.visible = false;
            },
            addProduct(product){
                if (!this.products) {
                    this.$set('products', []);
                }
                this.products.push(product);
                this.cacheProducts(this.products);
            },
            removeProduct(product){

                filteredCollection = this.products.filter(function(item){
                    return item.id != product.id;
                });

                this.products = filteredCollection;
                this.cacheProducts(this.products);

            },
            clearWishlist(){
                this.products = [];
                this.cacheProducts(this.products);
            },
            saveWishlist(){
                if(this.selectedWishlist){
                    this.$http.post('/api/wishlist/' + this.selectedWishlist.id, this.query).then((response) => {
                        this.selectedWishlist = response.data;
                        this.products = response.data.products;
                        this.updateWishlistPickerOptions();
                    }, function (data) {
                        console.log(data);
                        console.log('error');
                    }).bind(this);


                }else{
                //@todo we should be cheking to ensure that there are items to be sent, and there is a wishlistName
                this.$http.post('/api/wishlist', this.query).then((response) => {
                    console.log(response.data);
                    this.selectedWishlist = response.data;
                    this.products = response.data.products;
                    WishlistStore.save(this.products);
                    this.updateWishlistPickerOptions();
                }).bind(this);
                }




            },
            openWishlistPicker(){

            },
            newWishlist(){
                this.wishlistId = false;
                this.selectorWishlist = false;
                this.selectedWishlist = false;
                this.wishlistName = '';
                this.wishlistNamerVisible = true;
                this.wishlistPickerVisible = true;
                this.products = [];
                this.updateWishlistPickerOptions();
            },
            fetchWishlist(){
                if(this.wishlistId){
                this.$http.get('/api/wishlist/'+ this.wishlistId + '/', this.query).then((response) => {
                    console.log(response.data);
                    this.wishlistName = response.data.name;
                    this.selectedWishlist = response.data;
                    this.products = response.data.products;
                    WishlistStore.save(this.products);
                }).bind(this);
                }else{
                    this.products = WishlistStore.fetch();
                    this.updateWishlistPickerOptions();
                }
            },
            chooseWishlist(wishlist){
                console.log('wishlist chooseWishlist');
                this.selectedWishlist = wishlist;
                this.products = wishlist.products;
            },
            updateWishlistPickerOptions: function(){
                console.log('Wishlist updateWishlistPickerOptions');
                this.$http.get('/api/wishlist', this.query).then((response) => {
                    console.log(response.data);
                    this.wishlistPickerOptions = response.data;
                }).bind(this);
            }
        },
    }

</script>
