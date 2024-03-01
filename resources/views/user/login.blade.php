@extends('app')
@section('content')
<div class="row w-75 mx-auto">
    <div class="col-md-6 mt-2">
        <h2>Login Olshop</h2>
        <form method="post">
            @csrf
            <div class="mb-3">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" name="username" value="{{ old('username') }}" required/>
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" name="password" type="password" value="{{ old('password') }}" required/>
            </div>
            <div class="mb-3">
                <div>
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
                <div class="mt-2">
                    <a href="{{ route("user.register") }}" class="link-primary">Belum punya akun?</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
