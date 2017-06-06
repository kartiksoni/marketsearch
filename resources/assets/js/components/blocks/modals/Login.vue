<template>
    <div id="ComponentBlockModalLogin">
        <slot></slot>
    </div>
</template>
<style>

</style>
<script type="text/javascript">

    export default{
         ready: function () {
            console.log('ComponentBlockModalLogin Ready')
        },
        data(){
            return{
                visible: false,
            }
        },
        props:{

        },
        components:{

        },
        events: {
            'openLoginModal': function(){
                this.visible = true;
            }
        },
        methods: {
            closeModal(){
                console.log('closingSignupModal');
                this.$dispatch('closingModal');
                this.visible = false;
            },
            forgotPassword(){
                console.log('forgotPassword');
                this.$dispatch('forgotPassword');
                this.visible = false;
            },
            createAccount(){
                console.log('createAccount');
                this.$dispatch('createAccount');
                this.visible = false;
            },
            loginWithFacebook(){
                console.log('loginWithFacebook');
                this.$dispatch('loginWithFacebook');
            },
            loginWithGoogle(){
                console.log('loginWithGoogle');
                this.$dispatch('loginWithGoogle');
            },
            login(){
                console.log('login');
                this.$dispatch('login');
            },
        },
    }

</script>
