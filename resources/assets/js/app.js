
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */


import Home from './controllers/home/HomeIndexController.vue';
window.addEventListener('load', function () {
    new Vue({
        el: 'body',
        data: {

        },
        ready(){

        },
        components: {
            Home,
        },
        filters: { },
        http: {
            emulateJSON: true,
            emulateHTTP: true,
            headers: {
                'X-CSRF-TOKEN': function(){
                    if(document.querySelector('input[name="_token"]:not([value=""])'))
                    {
                        return document.querySelector('input[name="_token"]:not([value=""])').value
                    }
                    return '';
                },
            }
        },

    });
});