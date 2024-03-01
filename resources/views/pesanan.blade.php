@extends("app")
@section("content")
    <div class="container mx-auto">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>No.Telp Penjual</th>
                    <th>No Rekening Penjual</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($pesanan as $pesan)
                <tr>
                    <td>{{ $pesan->nama_produk }}</td>
                    <td>+62{{ $pesan->no_telp }}</td>
                    <td>{{ $pesan->no_rek }}</td>
                    <td>{{ ucfirst($pesan->status) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @if(session("no_rek"))
        <script>
            Swal.fire("Peringatan", "Silahkan transfer rekening ke \"{{ session("no_rek") }}\" untuk melanjutkan pembayaran!", "warning");
        </script>
    @endif
@endsection
