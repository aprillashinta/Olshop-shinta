@extends("app")
@section("content")
<form class="row" method="POST" action="{{ route("user.index") }}" enctype="multipart/form-data">
    <div class="col-7 mt-2">
        <h3>Edit Produk</h3>
        @csrf
        @method("PUT")
        <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
        <div class="mb-3">
            <label for="name">Nama Produk</label>
            <input class="form-control" name="nama" value="{{ $produk->nama }}" required/>
        </div>
        <div class="mb-3">
            <label for="name">Harga</label>
            <input class="form-control" name="harga" type="number" value="{{ $produk->harga }}" required/>
        </div>
        <div class="mb-3">
            <label for="name">Deskripsi</label>
            <textarea class="w-100 p-2" name="deskripsi" rows="5" required>{{ $produk->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-warning" type="submit">Edit</button>
        </div>
    </div>
    <div class="col">
        <div class="mt-3">
            <label>Image</label>
            <input class="form-control mt-2 mb-2" name="image" type="file" id="file" accept=".jpg,.png,.jpeg"/>
        </div>
        <p>Preview Image</p>
        <img id="img" class="w-75" src="{{ asset("images/".$produk->id_produk) }}" alt="Preview">
    </div>
    <script>
        document.getElementById("file").onchange = function(evt){
            const tgt = evt.target || evt.currentTarget, files = tgt.files;
            if (FileReader && files && files.length) {
                const fr = new FileReader();
                fr.onload = function () {
                    document.getElementById("img").src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }
        }
    </script>
</form>
@endsection
