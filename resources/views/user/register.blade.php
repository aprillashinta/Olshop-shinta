@extends('app')
@section('content')
<div class="row w-75 mx-auto">
    <div class="col-md-6 mt-2">
        <h2>Register Olshop</h2>
        <form method="post">
            @csrf
            <div class="mb-3">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" name="nama" value="{{ old('nama') }}" required/>
            </div>
            <div class="mb-3">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" name="username" value="{{ old('username') }}" required/>
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" name="password" type="password" value="{{ old('password') }}" required/>
            </div>
            <div class="mb-3">
                <label>Password Confirm <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password_confirm" value="{{ old('password_confirm') }}" required/>
            </div>
            <div class="mb-3">
                <label>No.Telp <span class="text-danger">*</span></label>
                <div class="d-grid" style="grid-template-columns: 3rem auto;">
                    <div style="font-weight: 500; font-size: 18px;" class="d-flex align-items-center">+62</div>
                    <input class="form-control" name="no_telp" type="number" value="{{ old('no_telp') }}" required/>
                </div>
            </div>
            <div class="mb-2">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>
            <div>
                <a href="{{ route("user.login") }}" class="link-primary">Sudah punya akun?</a>
            </div>
        </form>
    </div>
</div>
@endsection
