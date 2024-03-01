<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olshop Shinta</title>
    <link rel="stylesheet" href="{{ asset("bootstrap-5.3.0/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("fontawesome-6.4.0/css/all.min.css")  }}">
    <script src="{{ asset("sweetalert2.js") }}"></script>
    <script src="{{ asset("jquery-3.7.0.min.js") }}"></script>
</head>
<body>
    @if($errors->any())
        <script>
            Swal.fire("Peringatan", "{{ $errors->first() }}", "warning");
        </script>
    @endif
    @if(session("message"))
        <script>
            Swal.fire("Berhasil", "{{ session("message") }}", "success");
        </script>
    @endif
    <nav style="background: #1E2430;">
        <div class="container py-3 text-white">
            <a href="{{ route("index") }}" class="text-white h4">Olshop Shinta</a>
            <a href="{{ route("pesanan") }}" class="float-end text-white" style="font-size: 18px;">Pesanan</a>
        </div>
    </nav>
    <div class="row w-100 h-100">
        @php ($url = url()->current())
        @if(str_contains($url, "user") && !str_contains($url, "login") && !str_contains($url, "register"))
            <div class="col-2">
                <div class="top-0 left-0 min-vh-100 px-0 ps-4 border w-100">
                    <a href="{{ route("user.index") }}">
                        <div class="mt-2 shadow-sm px-0 w-100 shadow sidebar"><i class="fa fa-shopping-cart"></i>&ensp;Produk</div>
                    </a>
                    <a href="{{ route("user.pesanan") }}">
                        <div class="mt-2 shadow-sm px-0 w-100 shadow sidebar"><i class="fa fa-shop"></i>&ensp;Pesanan</div>
                    </a>
                    <a href="{{ route("user.profil") }}">
                        <div class="mt-2 shadow-sm px-0 w-100 shadow sidebar"><i class="fa fa-user"></i>&ensp;Profil</div>
                    </a>
                </div>
            </div>
        @endif
        <div class="col px-4">@yield('content')</div>
    </div>
    <style>
        .sidebar {
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 18px;
            font-weight: 500;
        }
        .sidebar:hover {
            font-weight: 700;
        }
        a {
            color: #000;
            text-decoration: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
    </style>
    <script src="{{ asset("bootstrap-5.3.0/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("fontawesome-6.4.0/js/all.min.js") }}"></script>
</body>
</html>
