<template>
    <div id="ComponentBlockModalSignup">
        <slot></slot>
    </div>
</template>
<style>

</style>
<script type="text/javascript">

    export default{
         ready: function () {
            console.log('ComponentBlockModalSignup Ready')
        },
        data(){
            return{
                visible: false,
            }
        },
        props:{
            user: {
                default: function(){return {
                    email: '',
                    username: '',
                    password: '',
                }}
            }
        },
        events: {
            'openSignupModal': function(data){
                this.visible = true;
            }
        },
        methods: {
            closeModal(){
                console.log('closingSignupModal');
                this.$dispatch('closingModal');
                this.visible = false;
            },
            createUser(){
                console.log('creatingUser');
                this.$dispatch('creatingUser');
            },
        },
    }

</script>
