@extends('layouts/app')

@section('content')

<div class="row">
    <div class="col-8 offset-2 text-center">
        <div class="title m-b-md">
            Ordermaker
        </div>

        <div class="links">
            <a href="#show_order_form" v-on:click="create_order()">Оформить заказ</a>
        </div>

        <div class="alert alert-success" role="alert" v-if="show_order_message">
            You order created successfully!
        </div>
    </div>
</div>
<div class="row hidden" v-if="show_order_form">
    <div class="col-8 offset-2">
        <div class="order-form">
            <form>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" ref="phone" placeholder="Enter phone number" value="994513739930">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" ref="name" placeholder="Enter name" value="Afgan">
                </div>


                <div class="form-group">
                    <label for="product">Select Product</label>
                    <select class="form-control" id="product" ref="product" v-on:change="product_changed($event)">
                        <option v-for="product in products" v-bind:value="product.id">
                            @{{ product.name }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="rate">Select Rate</label>
                    <select class="form-control" id="rate" ref="rate" v-on:change="rate_changed($event)">
                        <option v-for="rate in rates" v-bind:value="rate.id">
                            @{{ rate.name }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" ref="price" v-bind:value="currentprice" disabled>
                </div>

                <div class="form-group">
                    <label for="delivery">Select Delivery</label>
                    <select class="form-control" ref="delivery">
                        <option v-for="delivery in deliveries" v-if="delivery.rate == currentdelivery" v-bind:value="delivery.id">
                            @{{ delivery.name }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" ref="address" placeholder="Enter address" value="Baku, Azerbaijan">
                </div>
                <button type="button" class="btn btn-primary" v-on:click="insertorder">Submit</button>
            </form>
            <hr>
        </div>
    </div>
</div>

@endsection