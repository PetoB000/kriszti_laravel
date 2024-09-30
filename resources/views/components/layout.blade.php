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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/basket.css">
    {{ $css }}
</head>

<body>
    {{-- MENU --}}

    <div class="menu">
        <img src="./img/logo3.png" alt="Kriszti műhelye logo" onclick="relocateTo('/')" class="logo">
        <div class="main_link pulse mx-2 border border-black rounded-4 py-1 px-3 border-2 " onclick="relocateTo('/')">
            Főoldal</div>
        <div class="main_link pulse mx-2 border border-black rounded-4 py-1 px-3 border-2 "
            onclick="relocateTo('/Rólam')">Rólam</div>
        <div class="main_link pulse mx-2 border border-black rounded-4 py-1 px-3 border-2 "
            onclick="relocateTo('/Vásárlás_menete')">Vásárlás menete</div>
        <div class="main_link pulse mx-2 border border-black rounded-4 py-1 px-3 border-2 "
            onclick="relocateTo('/Kapcsolat')">Kapcsolat</div>
        <div class="dropdown">
            <div class="main_link pulse mx-2 border border-black rounded-4 py-1 px-3 border-2 ">Termékeim <img
                    src="./img/icons/down-arrow(2).svg" alt="" class="icon"></div>

        </div>
        <ul class="dropdown-content end-0 flex-column p-0">

            @foreach ($categories as $category)
                <li class="dropdown-item mb-1 d-flex bg-custom justify-content-center fs-6 bg-custom border border-black rounded-4  ">
                    <a href="/Kategória-{{ $category['name'] }}" class="text-black">{{ $category['name'] }}</a></li>
            @endforeach
        </ul>

        <div class="ms-3 me-2 me-sm-5 basket border border-black  p-2 border-2" id="basket-icon">
            <div class="basket-counter px-2 rounded-4 bg-danger text-white position-absolute end-0" id="basket_counter"></div>
            <img class="basket-icon" src="./img/icons/noun-basket-6865168.svg" alt="">
        </div>

        <div id="nav-icon3" class="me-2 me-sm-5">
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



    <div class="container m-0 p-0 top-0 end-0 position-fixed" id="basket" style="max-width: 500px; height: 100vh; background-color: #333;">

        <div class="col p-0 d-flex justify-content-between text-center align-items-center">
            <h1 class="mx-auto text-white" id="basket_text">Kosarad</h1>
            <svg class="me-4" id="basket-close-button" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="red" clip-rule="evenodd">
              <path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm0 10.293l5.293-5.293.707.707-5.293 5.293 5.293 5.293-.707.707-5.293-5.293-5.293 5.293-.707-.707 5.293-5.293-5.293-5.293.707-.707 5.293 5.293z"/>
            </svg>
        </div>

        <div class="container-fluid p-0" id="basketProdContainer">
            <div class="row mx-0 productDiv">

                <div class="cart-item d-flex justify-content-between align-items-center bg-dark text-light p-2 pe-0 w-100">
                  <div class="d-flex align-items-center">
                    <img id="pImg" src="../img/no-bg/poharalatet.png" alt="Product Image" class="img-fluid" style="max-width: 80px;">
                    <div class="ms-3">
                      <h6 class="mb-0" id="pName">Hajlított kicsi tál</h6>
                    </div>
                  </div>
            
                  <div class="d-flex align-items-center">
                    <span class="me-2">Mennyiség:</span>
                    <div class="input-group d-flex flex-column">
                      <button class="btn btn-outline-light p-1" id="incrementBtn">+</button>
                      <p class="p-1 m-0 text-center" id="quantity">1</p>
                      <button class="btn btn-outline-light p-1" id="decrementBtn">-</button>
                    </div>
                  </div>
            
                  <div class="d-flex align-items-center">
                    <div>
                      <strong>Ára: <br> <span id="price">2.500 Ft</span></strong>
                    </div>
                    <button class="btn p-1" id="removeBtn">
                      <img  src="../img/icons/trashcan.svg" style="width: 25px;">
                    </button>
                  </div>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-end mx-0 position-absolute w-100 bottom-0 mt-0" >
          <div class="col-12 p-3 bg-light text-center">
            <p>Összesen: 2.500 Ft + Szállítás</p>
            <button class="btn btn-warning btn-lg rounded rounded-3 w-100">Rendelés leadása</button>
          </div>
        </div>
      </div>
      
      

    {{-- \ CART / --}}

    {{ $javaScript }}
    <script src="js/basket.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
