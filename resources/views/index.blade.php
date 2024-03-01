@extends("app")
@section("content")
    <div class="container mx-auto row mt-2">
        @foreach($produks as $produk)
            <div class="col-2 p-3" style="background: #EEE">
                <a href="{{ route("detail", $produk->id_produk) }}">
                    <div class="overflow-hidden" style="aspect-ratio: 1/1;">
                        <img class="w-100 h-100" alt="Produk" src="{{ asset("images/".$produk->id_produk) }}">
                    </div>
                    <h6 class="mt-2">{{ $produk->nama }}</h6>
                    <span>Rp {{ number_format($produk->harga, 0, ",", ".")  }}</span>
                </a>
            </div>
        @endforeach
    </div>
    <style>
        .col-2:hover {
            padding: .75rem !important;
        }
    </style>
@endsection
