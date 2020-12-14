@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h2>TOTAL PRODUCT</h2>
                    </div>
                    <div class="card-body text-center">
                        <h2>{{ $product_count }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card div-transparent">
                    <div class="card-header">
                        <h2>TOTAL ORDER</h2>
                    </div>
                    <div class="card-body text-center">
                        <h2>{{ $order_count }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card div-transparent">
                    <div class="card-header">
                        <h2>TODAY's SALE</h2>
                    </div>
                    <div class="card-body text-center">
                        <h2>{{ $today_sales }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection