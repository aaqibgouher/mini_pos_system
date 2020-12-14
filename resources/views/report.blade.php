@extends("layout.master")

@section('content')
    <div class="container mt-5">
        <form method="post" action="{{ route('report') }}">
            {{  csrf_field()}}
            <h2>SALES REPORT</h2>
            <span class="pull-right">
                <label>FILTER</label><br>
                <input type="submit" class="btn btn-outline-secondary" name="filter_date" value="FILTER">
            </span>
            <span class="pull-right">
                <label>END</label>
                <input class="form-control" name="end_date" type="date" value="{{ $filter_end_date }}">
            </span>
            <span class="pull-right">
                <label>START</label>
                <input class="form-control" name="start_date" type="date" value="{{ $filter_start_date }}">
            </span>
        </form><br><br><br><hr>
        @if($error)
            <div class="alert alert-danger" align="center">{{ $error }}</div>
        @endif
        <table class="table table-hover table-bordered">
            <thead>
                <tr align="center">
                    <th width="10%">S.NO</th>
                    <th width="15%">DATE</th>
                    <th width="15%">NO. OF ORDERS</th>
                    <th width="20%">TOTAL DISCOUNT</th>
                    <th width="20%">TOTAL AMOUNT</th>
                    <th width="20%">TOTAL PROFIT</th>
                </tr>
            </thead>
            <tbody> 
                @if(count($sales))
                    @foreach($sales as $sale)
                        <tr align="center">
                            <td class="counterCell"></td>
                            <td>{{ $sale->created_at->format("d M Y") }}</td>
                            <td>{{ $sale->count }}</td>
                            <td>&#8377; {{ $sale->discount }}</td>
                            <td align="right">&#8377; {{ $sale->total }}</td>
                            <td>&#8377; {{ $sale->total - $sale->discount }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr align="center">
                        <td class="text-danger" colspan="6">No Data Found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection