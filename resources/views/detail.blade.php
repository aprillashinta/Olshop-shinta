@extends("app")
@section("content")
    <div class="container row mx-auto mt-3">
        <div class="col-4">
            <img class="w-100" src="{{ asset("images/".$produk->id_produk) }}" alt="Produk">
        </div>
        <div class="col px-3">
            <h4>{{ $produk->nama }}</h4>
            <h5>Rp {{ number_format($produk->harga, 0, ",", ".")  }}</h5>
            <button class="btn btn-primary" onclick="beli()">
                <i class="fa fa-shopping-cart"></i>
                <span class="ms-1">Beli sekarang!</span>
            </button>
            <div class="mt-3">
                @foreach(explode("\n", $produk->deskripsi) as $txt)
                    <p>{{ $txt }}</p>
                @endforeach
            </div>
        </div>
        <form action="{{ route("pesanan") }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
        </form>
    </div>
    <script>
        function beli(){
            Swal.fire({
                title: "Pembelian Produk",
                html: `
                <input id="nama_lengkap" class="swal2-input" placeholder="Nama Lengkap" required>
                <input id="alamat_lengkap" class="swal2-input" placeholder="Alamat Lengkap" required>
                <input id="no_telp" class="swal2-input" placeholder="No Telp" type="number" inputmode="numeric" required>
                `,
                confirmButtonText: "Konfirmasi",
                focusConfirm: false,
                preConfirm: () => {
                    let swal = Swal.getPopup();
                    return {
                        nama_lengkap: swal.querySelector("#nama_lengkap").value,
                        alamat_lengkap: swal.querySelector("#alamat_lengkap").value,
                        no_telp: swal.querySelector("#no_telp").value
                    };
                }
            }).then(res => {
                for(var key in res.value){
                    $("form").append(`<input name="${key}" value="${res.value[key]}">`);
                }
                $("form").submit();
            });
        }
    </script>
@endsection
