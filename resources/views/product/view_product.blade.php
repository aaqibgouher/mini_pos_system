@extends('layout.master')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card div-transparent">
                    <div class="card-header">
                        <h2>View ({{ $product->id }})<span><a type="button" class="btn btn-outline-secondary pull-right" href="{{ route('edit_product', $product->id) }}" data-toggle="tooltip" title="EDIT PRODUCT"><i class="fa fa-pencil"></i></a></span></h2>
                    </div>
                    <div class="card-body">
                        <h4>Product Name</h4>{{ $product->product_name }}<hr>
                        <h4>Description </h4>{{ $product->description }}<hr>
                        <h4>Price(&#8377;)</h4>{{ $product->price }}<hr>
                        <h4>Status</h4>{{ $product->status ? 'Available' : 'Not Available' }}<hr>
                    </div>
                    <div class="card-footer">
                        <h4>Created</h4>{{ $product->created_at }}<hr>
                        <h4>Updated</h4>{{ $product->updated_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection