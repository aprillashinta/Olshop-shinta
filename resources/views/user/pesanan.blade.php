@extends("app")
@section("content")
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>Nama Produk</th>
                <th>Nama Pembeli</th>
                <th>No.Telp Pembeli</th>
                <th>Alamat Pembeli</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan as $pesan)
                <tr>
                    <td>{{ $pesan->nama }}</td>
                    <td>{{ $pesan->nama_lengkap }}</td>
                    <td>{{ $pesan->no_telp }}</td>
                    <td>{{ $pesan->alamat_lengkap }}</td>
                    <td>
                        <form method="POST" id="form-{{ $pesan->id_pesanan }}" onsubmit="konfirmasi('{{ $pesan->status }}', `{{ $pesan->id_pesanan }}`); return false;"
                              action="{{ $pesan->status == "pembayaran" ? route("user.pembayaran") : route("user.pengiriman") }}">
                            @csrf
                            <input type="hidden" name="id_pesanan" value="{{ $pesan->id_pesanan }}">
                            <button class="btn btn-warning" type="submit" @if($pesan->status == "selesai") disabled="disabled" @endif>
                                @if($pesan->status != "selesai")
                                    Konfirmasi {{ ucfirst($pesan->status) }}
                                @else
                                    Selesai
                                @endif
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if(count($pesanan) < 1)
                <tr><td colspan="6"><h5>Tidak ada pesanan...</h5></td></tr>
            @endif
        </tbody>
    </table>
    <script>
        function konfirmasi(status, id){
            Swal.fire({
                title: "Peringatan",
                text: `Apakah kamu yakin ingin konfirmasi ${status} ini?`,
                icon: "warning",
                cancelButtonText: "Batalkan",
                confirmButtonText: "Konfirmasi",
                showCancelButton: true
            }).then(res => {
                if(res.isConfirmed) document.getElementById("form-" + id).submit();
            });
        }
    </script>
@endsection
