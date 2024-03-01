@extends("app")
@section("content")
    <div class="row">
        <h4 class="col d-flex align-items-center">Welcome, {{ $username }}!</h4>
        <div class="col">
            <a href="{{ route("user.create") }}" class="float-end"><button class="btn btn-primary my-3">Tambah Produk</button></a>
        </div>
    </div>
    <table class="table table-bordered mt-2">
        <thead>
            <tr class="text-center">
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produks as $produk)
                <tr class="text-center">
                    <td class="d-flex justify-content-center">
                        <img style="height: 5rem" alt="Produk" src="{{ asset("images/".$produk->id_produk) }}">
                    </td>
                    <td>{{ $produk->nama }}</td>
                    <td>Rp {{ number_format($produk->harga, 0, ",", ".")  }}</td>
                    <td style="max-width: 25rem;">{{ substr($produk->deskripsi, 0, 200)."..." }}</td>
                    <td style="width: 6rem;">
                        <a href="{{ route("user.edit", $produk->id_produk) }}"><button class="btn btn-warning w-100">Edit</button></a>
                        <form action="{{ route("user.index") }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
                            <button type="submit" class="btn btn-danger w-100 mt-2">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if(count($produks) < 1)
                <tr>
                    <td colspan="5" class="p-3"><h5>Tidak ada produk...</h5></td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
