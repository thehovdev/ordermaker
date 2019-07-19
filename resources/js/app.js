/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({

    el: '#app',
    data : {
        show_order_form: false,
        show_order_message: false,
        currentrate: 1,
        currentdelivery: 1,
        currentprice: 930,
        products: [
            {
                id : 1,
                name :'First product',
                price : 900
            },
            {
                id : 2,
                name :'Second product',
                price : 1000
            },
            {
                id : 3,
                name :'Last product',
                price : 1100
            },
        ],
        rates: [
            { 
                id : 1,
                name :'First rate',
                price : 30
            }, 
            { 
                id : 2,
                name :'Second rate',
                price : 50
            }, 
        ],
        deliveries: [
            { 
                id : 1,
                rate : 1,
                name :'One day delivery' 
            }, 
            { 
                id : 2,
                rate : 2,
                name :'Two day delivery' 
            }, 
        ]
    },
    methods: {

        // get_price: function(product, rate) {

        // },

        product_changed: function(e) {
            var index = e.target.selectedIndex;
            var product_price = this.products[index].price

            var rate = document.getElementById("rate");
            var rate_id = rate.selectedIndex;
            var rate_price = this.rates[rate_id].price;

            var total_price = product_price + rate_price;
            this.currentprice = total_price;
        },
        rate_changed : function(e) {
            var id = e.target.options[e.target.options.selectedIndex].value
            var index = e.target.selectedIndex;           
            var rate_price = this.rates[index].price

            console.log(id);

            var product = document.getElementById("product");
            var product_id = product.selectedIndex;
            var product_price = this.products[product_id].price;

            var total_price = rate_price + product_price;
            this.currentprice = total_price;
            this.currentdelivery = id;
        },
        insertorder: function() {
            var phone = this.$refs.phone.value.trim()
            var name = this.$refs.name.value.trim()
            var address = this.$refs.address.value.trim()
            // var rate = this.$refs.rate.value.trim()
            
            var product = parseInt(this.$refs.product.value.trim());
            var rate = parseInt(this.$refs.rate.value.trim())
            var delivery = parseInt(this.$refs.delivery.value.trim())
            // закрываем форму заполнения данных и показываем сообщение
            this.finish_order();

            axios.get('/order/insert', {
                params: {
                    phone: phone,
                    name : name,
                    address : address,
                    product: product,
                    rate : rate,
                    delivery : delivery
                }
            })
            .then(function (response) {
                console.log(response);
            }).catch(function (error) {
                console.log(error);
            });
        },

        create_order : function() {
            this.show_order_form = true;
            this.show_order_message = false;
            return true;
        },

        finish_order : function() {
            this.show_order_form = false;
            this.show_order_message = true;
            return true;
        },
    }
});
