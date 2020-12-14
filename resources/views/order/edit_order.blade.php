@extends('layout.master')

@section('content')
<div class="container mt-5">
    <form method="post" action="{{ route('edit_order', $order->id) }}">
        {{ csrf_field() }}
        <h2>EDIT ORDER({{ $order->id }})
            <span>
                <input type="submit" name="add_order_button" data-toggle="tooltip" title="UPDATE ORDER" class="btn btn-outline-secondary pull-right" value="Save">
            </span><hr>
        </h2>
        <h5 style="text-align:center;">ORDER NO : {{ $order->order_no }} </h5>
        @if($error)
            <div class="alert alert-danger" align="center" colspan="6">{{ $error }}</div>
        @endif
        <table class="table table-hover table-bordered" id="add_order_table">
            <thead>
                <tr style="text-align:center">
                    <th width="10%">S.NO.</th>
                    <th width="50%">PRODUCT NAME</th>
                    <th width="10%">QTY</th>
                    <th width="10%">PRICE(&#8377;)</th>
                    <th width="10%">AMOUNT(&#8377;)</th>
                    <th width="10%">ACTIONS</th>
                </tr>
             </thead>
            <tbody id="order_list">
                @if(count($order_products))
                    @foreach($order_products as $order_product)
                        <tr align="center">
                            <td class="counterCell"></td>
                            <td>
                                <select class="form-control item_select" name="items[]">
                                    <option value="">Choose Item</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}" data-price="{{ $product->price }}" {{ ($product->id==$order_product->product_id) ? 'selected' : '' }}>{{ $product->product_name }}</option>
                                        @endforeach
                                    
                                </select>
                            </td>
                            <td><input type="number" name="quantity[]" value="{{ $order_product->quantity }}" class="form-control item_quantity" required></td>
                            <td><input type="number" disabled name="price" value="{{ json_decode($order_product->product_detail, true)['price'] }}" class="form-control price"></td>
                            <td><input type="number" disabled name="amount" value="{{ $order_product->amount }}" class="form-control amount"></td>
                            <td>
                                <a type="button" href="#" class="btn btn-outline-secondary delete_item_btn" data-toggle="tooltip" title="DELETE ITEM"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="6">
                        <button type="button" class="btn btn-outline-secondary btn-block" id="add_order">ADD NEW ITEM</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td align="right"><b>Subtotal(&#8377;)</b></td>
                    <td align="right"><b><input type="number" value="{{ $order->subtotal }}" class="form-control" name="subtotal" id="subtotal" disabled></b></td>
                    <td></td>
                   
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td align="right"><b>Discount(&#8377;)</b></td>
                    <td align="right"><b><input type="number" value="{{ $order->discount }}" class="form-control" name="discount" id="discount"></b></td>
                    <td></td>
                   
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td align="right"><b>Total(&#8377;)</b></td>
                    <td align="right"><b><input type="number" value="{{ $order->total }}" class="form-control" name="total" id="total" disabled></b></td>
                    <td></td>
                    
                </tr>
            </tfooter>
        </table>
    </form>
    <table class="d-none" id="order_row_hidden">
        <tr align="center">
            <td class="counterCell"></td>
            <td>
                <select class="form-control item_select" name="items[]">
                    <option value="">Choose Item</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->product_name }}</option>
                    @endforeach
                    
                </select>
            </td>
            <td><input type="number" name="quantity[]" value="1" class="form-control item_quantity" required></td>
            <td><input type="number" disabled name="price" value="0" class="form-control price"></td>
            <td><input type="number" disabled name="amount" value="0" class="form-control amount"></td>
            <td>
                <a type="button" href="#" class="btn btn-outline-secondary delete_item_btn"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    </table>
</div>
@endsection