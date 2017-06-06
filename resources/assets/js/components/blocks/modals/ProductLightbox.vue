<template>
    <div id="ComponentBlockModalLightbox">
        <slot></slot>
    </div>
</template>
<style>

</style>
<script type="text/javascript">

    export default{
        ready: function () {
            console.log('ComponentBlockModalLightbox Ready')
        },
        data(){
            return{
                visible: false,
                image: false,
            }
        },
        components:{

        },
        events: {
            'openLightboxModal': function(data){
                this.visible = true;
            },
            'openProductLightbox': function (product){
                console.log('ProductLightbox openProductLightbox');
                this.image = product.image_url;
                this.visible = true;
            },
            'openImageLightbox': function(image){
                this.image = image;
                this.visible = true;
            }
        },
        methods: {
            closeModal(){
                console.log('closingLightboxModal');
                this.$dispatch('closingModal');
                this.image = false;
                this.visible = false;
            },
        },
    }

</script>
