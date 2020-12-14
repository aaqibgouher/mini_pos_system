@extends("layout.master")

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-4 offset-sm-4">
                <!-- <h2>LOGIN</h2> -->
                <div class="card">
                    <div class="card-header">
                    Register
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            @if($error)
                            <div class="alert alert-danger">{{ $error }}</div>
                            @endif
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div> 
                            <hr>
                            <input type="submit" value="Register" class="btn btn-primary btn-block">
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>

@endsection