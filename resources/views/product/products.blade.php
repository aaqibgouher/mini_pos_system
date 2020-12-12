@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <h3>PRODUCTS<span class="pull-right"><a class="btn btn-outline-secondary" type="button" href="{{ route('add_product') }}" data-toggle="tooltip" title="ADD PRODUCT">ADD</a></span></h3><hr>
        <table class="table table-hover">
            <thead>
                <tr style="text-align:center">
                    <th>S.NO.</th>
                    <th>PRODUCT</th>
                    <th>PRICE</th>
                    <th>DESCRIPTION</th>
                    <th>STATUS</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @if(count($products))
                    @foreach($products as $product)
                        <tr>
                            <td class="counterCell"></td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->status ? 'Available' : 'Not Available' }} </td>
                            <td>
                                <div class="btn-group">
                                    <a type="button" href="{{ route('edit_product', $product->id) }}" class="btn btn-outline-secondary" data-toggle="tooltip" title="EDIT PRODUCT"><i class="fa fa-pencil"></i></a>
                                    <a type="button" href="{{ route('view_product', $product->id) }}" class="btn btn-outline-secondary" data-toggle="tooltip" title="VIEW PRODUCT"><i class="fa fa-eye"></i></a>
                                    <a type="button" href="{{ route('delete_product', $product->id) }}" class="btn btn-outline-secondary" data-toggle="tooltip" title="DELETE PRODUCT"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr style="text-align:center">
                        <td colspan='6'>No Products Available</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection