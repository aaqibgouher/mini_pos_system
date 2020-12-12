@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <h2>
            ORDERS
            <span>
                <a type="button" href="{{ route('add_order') }}" class="btn btn-outline-secondary pull-right" data-toggle="tooltip" title="ADD ORDER">ADD</a>
            </span><hr>
        </h2>

        <table class="table table-hover">
            <thead>
                <tr style="text-align:center">
                    <th>S.NO.</th>
                    <th>ORDER NO.</th>
                    <th>SUBTOTAL</th>
                    <th>DISCOUNT</th>
                    <th>TOTAL</th>
                    <th>DATE/TIME</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @if(count($orders))
                    @foreach($orders as $order)
                        <tr align="center">
                            <td class="counterCell"></td>
                            <td>{{ $order->order_no }}</td>
                            <td>{{ $order->subtotal }}</td>
                            <td>{{ $order->discount }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->created_at }} </td>
                            <td>
                                <div class="btn-group">
                                    <a type="button" href="{{ route('edit_order', $order->id) }}" class="btn btn-outline-secondary" data-toggle="tooltip" title="EDIT ORDER"><i class="fa fa-pencil"></i></a>
                                    <a type="button" href="{{ route('view_order', $order->id) }}" class="btn btn-outline-secondary" data-toggle="tooltip" title="VIEW ORDER"><i class="fa fa-eye"></i></a>
                                    <a type="button" href="{{ route('delete_order', $order->id) }}" class="btn btn-outline-secondary" data-toggle="tooltip" title="DELETE ORDER"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr style="text-align:center">
                        <td colspan='7'>No Orders Available</td>
                    </tr>
                @endif
            </tbody>

        </table>

    </div>
@endsection