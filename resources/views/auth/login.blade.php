@extends('layout.master')

@section('content')
    <div class="row mt-5">
        <div class="col-sm-4 offset-sm-4">
            <div class="container">
                <!-- <h2>LOGIN</h2> -->
                <div class="card">
                    <div class="card-header">
                    LOGIN
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            @if($error)
                            <div class="alert alert-danger">{{ $error }}</div>
                            @endif
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div> 
                            <hr>
                            <input type="submit" value="Login" class="btn btn-primary btn-block">
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection
