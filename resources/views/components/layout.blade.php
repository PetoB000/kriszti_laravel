<!doctype html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kriszti Műhelye</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="website icon" type="png"
        href="./img/purple-epoxy-resin-icon-cartoon-circle-vector-45522988-removebg.png">

    {{ $css }}
</head>

<body>
    {{-- MENU --}}

    <div class="menu">
        <img src="./img/logo3.png" alt="Kriszti műhelye logo" onclick="relocateTo('/')" class="logo">
        <div class="main_link pulse mx-2 border border-black rounded-4 py-1 px-3 border-2 " onclick="relocateTo('/')">
            Főoldal</div>
        <div class="main_link pulse mx-2 border border-black rounded-4 py-1 px-3 border-2 "
            onclick="relocateTo('/Rolam')">Rólam</div>
        <div class="main_link pulse mx-2 border border-black rounded-4 py-1 px-3 border-2 "
            onclick="relocateTo('/Vasarlas_menete')">Vásárlás menete</div>
        <div class="main_link pulse mx-2 border border-black rounded-4 py-1 px-3 border-2 "
            onclick="relocateTo('/Kapcsolat')">Kapcsolat</div>
        <div class="dropdown">
            <div class="main_link pulse mx-2 border border-black rounded-4 py-1 px-3 border-2 ">Termékeim <img
                    src="./img/icons/down-arrow(2).svg" alt="" class="icon"></div>

        </div>
        <ul class="dropdown-content end-0 flex-column p-0">

            @foreach ($categories as $category)
                <li class="dropdown-item mb-1 d-flex bg-custom justify-content-center fs-6 bg-custom border border-black rounded-4  ">
                    <a href="" class="text-black">{{ $category['name'] }}</a></li>
            @endforeach
        </ul>
        <div class="basket-counter px-2 rounded-4 bg-danger text-white position-absolute end-0">0</div>
        <div class="ms-3 me-5 basket border border-black  p-2 border-2" id="basket-icon">
            <img class="basket-icon" src="./img/icons/noun-basket-6865168.svg" alt="">
        </div>

        <div id="nav-icon3">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    {{-- \ MENU / --}}

    {{ $main }}

    {{-- FOOTER --}}

    <footer class="container-fluid bg-custom py-4">
        <div class="row row-cols-sm-2 row-cols-md-3">
            <div class="col d-flex flex-column text-center align-items-center">
                <h5>Kriszti Epoxy műhelye</h5>Ajándéktárgyimat kézzel, egyedileg készítem, igy minden alkotásom más és
                más.
            </div>
            <div class="col d-flex flex-column text-center align-items-center">
                <h5>Jogi tudnivalók</h5>
                <div class="list-group">
                    <a href="#" class="text-black mb-1">Vásárlási feltételek</a>
                    <a href="#" class="text-black mb-1">Adatkezelési tájékoztató</a>
                    <a href="#" class="text-black mb-1">Szállítási módok</a>
                    <a href="#" class="text-black">Fizetési módok</a>
                </div>
            </div>
            <div class="col-sm-12 col d-flex flex-column text-center align-items-center my-auto">
                <h5>Kapcsolat</h5>
                <ul class="list-group">
                    <div>Petőné Birta Kriszti</div>
                    <div>4243 Téglás, Beck Pál utca 34</div>
                    <div>+36 20 416 64 22</div>
                    <div>krisztiepoxymuhelye@gmail.com</div>
                </ul>
            </div>
        </div>
    </footer>

    {{-- \ FOOTER / --}}


    {{-- CART --}}

    <div class="container p-0 top-0 end-0 position-fixed" id="basket">
        <div class="row">
            <div class="col p-0 d-flex justify-content-between  text-center align-items-center">
                <h1 class="mx-auto text-white" id="basket_text">Kosarad</h1>
                <svg class="me-4" id="basket-close-button" width="24" height="24"
                    xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="red" clip-rule="evenodd">
                    <path
                        d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm0 10.293l5.293-5.293.707.707-5.293 5.293 5.293 5.293-.707.707-5.293-5.293-5.293 5.293-.707-.707 5.293-5.293-5.293-5.293.707-.707 5.293 5.293z" />
                </svg>

            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-column text-center align-items-center">

            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-column text-center align-items-center">

            </div>
        </div>
    </div>

    {{-- \ CART / --}}

    {{ $javaScript }}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
