@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-header">
                    EDIT PRODUCT DETAILS ({{ $product->id }})
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('edit_product', $product->id) }}">
                            {{ csrf_field() }}
                            @if($error)
                            <div class="alert alert-danger">{{ $error }}</div>
                            @endif
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" type="text" name="description" value="{{ old('description') }}" rows="5" id="comment" required>{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Price(&#8377;)</label>
                                <input type="number" class="form-control" name="price" value="{{ $product->price }}" required>
                            </div> 
                            <div class="form-check form-group">
                                <label class="form-check-label">
                                    <input type="checkbox" name="status" class="form-check-input" {{ $product->status ? 'checked' : '' }}> In Menu
                                </label>
                            </div>
                            <hr>
                            <input type="submit" value="Add" class="btn btn-outline-secondary btn-block">
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection