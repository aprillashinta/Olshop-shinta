@extends("app")
@section("content")
    <form action="{{ route("user.profil") }}" method="POST" class="container mx-auto">
        @csrf
        <div class="mb-3">
            <label>Username</label>
            <input readonly class="form-control" value="{{ $user->username }}">
        </div>
        <div class="mb-3">
            <label>Nomor Rekening</label>
            <input class="form-control" name="no_rek" value="{{ $user->no_rek }}" placeholder="Nomor Rekening">
        </div>
        <div class="mb-3">
            <label>No. Telp</label>
            <div class="d-grid mt-1" style="grid-template-columns: 3rem auto;">
                <div style="font-weight: 500; font-size: 18px;" class="d-flex align-items-center">+62</div>
                <input class="form-control" name="no_telp" value="{{ $user->no_telp }}" placeholder="No. Telp">
            </div>
        </div>
        <button class="btn btn-warning" type="submit">Update</button>
    </form>
@endsection
