@extends('layout.master')

@section('content')
<div class="container mt-5">
        <h2>VIEW ORDER ({{ $order->id }})
            <span>
                <!-- <input type="submit" name="add_order_button" class="btn btn-outline-secondary pull-right" value="Save"> -->
                <a type="button" href="{{ route('edit_order', $order->id) }}" class="btn btn-outline-secondary pull-right" data-toggle="tooltip" title="EDIT ORDER"><i class="fa fa-pencil"></i></a>
            </span><hr>
        </h2>
        <h5 style="text-align:center;">ORDER NO : {{ $order->order_no }}</h5>
        @if($error)
            <div class="alert alert-danger" align="center" colspan="6">{{ $error }}</div>
        @endif
        <table class="table table-hover table-bordered" id="add_order_table">
            <thead>
                <tr style="text-align:center">
                    <th width="10%">S.NO.</th>
                    <th width="10%">ORDER ID</th>
                    <th width="20%">PRODUCT ID</th>
                    <th width="10%">QTY</th>
                    <th width="10%">PRICE</th>
                    <th width="20%">AMOUNT</th>
                    <th width="20%">DATE/TIME</th>
                </tr>
            </thead>
            <tbody id="order_list"></tbody>
                @if(count($order_products))
                    @foreach($order_products as $order_product)
                        <tr align="center">
                            <td class="counterCell"></td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order_product->product_id }}</td>
                            <td>{{ $order_product->quantity }}</td>
                            <td>{{ $order_product->product->price }}</td>
                            <td>{{ $order_product->amount }}</td>
                            <td>{{ $order->updated_at ? $order->updated_at : $order->created_at }}</td>
                        </tr>
                    @endforeach
                @endif
            <tfooter>
                <tr>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td align="right"><b>Subtotal</b></td>
                    <td align="right"><b><input type="number" value="{{ $order->subtotal }}" class="form-control" name="subtotal" id="subtotal" disabled></b></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td align="right"><b>Discount</b></td>
                    <td align="right"><b><input type="number" value="{{ $order->discount }}" class="form-control" name="discount" id="discount" disabled></b></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td align="right"><b>Total</b></td>
                    <td align="right"><b><input type="number" value="{{ $order->total }}" class="form-control" name="total" id="total" disabled></b></td>
                </tr>
            </tfooter>
        </table>
   
</div>
@endsection 