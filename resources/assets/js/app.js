
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$(document).ready(function(){

    function update_price(selector, price){
        $(selector).closest('tr').find('.price').val(price);
    }

    function update_amount(selector){
        var parent = $(selector).closest('tr');
        var qty = +(parent.find('.item_quantity').val());
        var price = +(parent.find('.price').val());
        var amount = qty*price;
        parent.find('.amount').val(amount);
    }

    function update_subtotal(){
       var amount_doms = $(document).find('#add_order_table').find('.amount');
       var subtotal = 0;

        for(amount_dom of amount_doms){
            var amount = +($(amount_dom).val());
            subtotal += amount;
        }

        $(document).find('#subtotal').val(subtotal);
    }

    function update_total(){
        var subtotal = $('#subtotal').val();
        var discount = $('#discount').val();
        var total = subtotal - discount;

        $(document).find('#total').val(total);
    }

    function delete_order_item(selector){
        $(selector).closest('tr').remove();
    }
    
    $(document).on('change', ".item_select", function(){
        var price = +($(this).find(":selected").data("price"));
        update_price(this, price);
        update_amount(this);
        update_subtotal();
        update_total();
    });

    $(document).on('change', ".item_quantity", function(){
        update_amount(this);
        update_subtotal();
        update_total();
    });

    $(document).on('change', '#discount', function(){
        update_total();
    });

    $(document).on('click', '.delete_item_btn', function(){
        delete_order_item(this);
        update_subtotal();
        update_total();
    });
    
    $("#add_order").on('click', function(){
        var clone = $("#order_row_hidden").clone();
        clone = clone.find("tr");
        $("#order_list").append(clone);
    }); 
    
   
});