<x-layout>
    <x-slot:css>
        <link rel="stylesheet" href="css/index.css">
    </x-slot:css>
    <x-slot:main>

    {{-- HERO SECTION --}}

    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto">
                <div class="card border-0 flex-row p-0 bg-transparent">
                    <img src="img/about_me_img.JPG" alt="Profile Image" id="about_img" class="rounded me-2 w-25" >
                    <div class="mt-4 card_body justify-content-center align-items-center d-flex flex-column">
                        <h5 class="card-title fs-3 d-flex justify-content-center ">ISMERJ MEG</h5>
                        <p class="card-text d-flex  text-center ">
                            Szia! Örülök, hogy itt vagy! Petőné Birta Krisztina vagyok, 2 csodálatos gyerek édesanyja,
                            és egy mindenben támogató férj felesége, sok szeretettel köszöntelek az oldalamon.
                        </p>
                        <div class="d-flex justify-content-center">
                            <a href="/Rólam" class="btn btn-outline-secondary">Olvasd tovább</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- \ HERO SECTION / --}}

    {{-- CATEGORY SECTION --}}

    <div class="container-fluid px-lg-5  mt-3">

        <div class="row">
            <div class="col d-flex justify-content-center my-4">
                <h1 class="fs-sm-5">Termék kategóriáim</h1>
            </div>
        </div>


        <div class="row px-lg-5 d-flex row-cols-2 row-cols-sm-3 row-cols-lg-5 justify-content-center">
            @for ($i = 0; $i < count($sortedCategories); $i += 2)
                <div class="d-flex col mb-1 p-1 category_container position-relative">
                    <div class="position-relative h-100 w-100 category" onclick="relocateTo('/Kategória/{{ $sortedCategories[$i]['name'] }}')">
                        <img class="w-100 object-fit-cover my-1 rounded category_img" src="{{ asset($sortedCategories[$i]['cover_image']) }}" alt="{{ $sortedCategories[$i]['name'] }}">
                        <div class="category_text w-100 position-absolute">{{ $sortedCategories[$i]['name'] }}</div>
                    </div>
                    @if (isset($sortedCategories[$i + 1]))
                        <div class="position-relative col h-100 w-100 category" onclick="relocateTo('/Kategória/{{ $sortedCategories[$i + 1]['name'] }}')">
                            <img class="w-100 object-fit-cover my-1 rounded category_img" src="{{ asset($sortedCategories[$i + 1]['cover_image']) }}" alt="{{ $sortedCategories[$i + 1]['name'] }}">
                            <div class="category_text w-100 position-absolute">{{ $sortedCategories[$i + 1]['name'] }}</div>
                        </div>
                    @endif
                </div>
            @endfor
            @if (!empty($remainings))
                @foreach ($remainings as $remaining)
                    <div class="d-flex category_container col mb-1 p-1 position-relative">
                        <div class="position-relative h-100 w-100 category" onclick="relocateTo('/Kategória/{{ $remaining['name'] }}')">
                            <img class="w-100 object-fit-cover my-1 rounded category_img" src="{{ asset($remaining['cover_image']) }}" alt="{{ $remaining['name'] }}">
                            <div class="position-absolute w-100 category_text">{{ $remaining['name'] }}</div>
                        </div>
                    </div>
                @endforeach
                
            @endif
        </div>
    
        
    </div>

    {{-- \ CATEGORY SECTION / --}}

    {{-- GALLERY SECTION --}}

    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center mb-2 mt-5">
                <h1>Galéria</h1>
            </div>
        </div>
    </div>

    <div class="slider-container">
      <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded">
          <img src="./img/icons/White_Double_Arrow_To_Up_Icon_Transparent_PNG-removebg-preview(1).svg" alt="">
        </button>
        <ul class="image-list p-0">
            @foreach ($galleryImages as $image)
                <li>
                    <img class="image-item"  src="{{ asset($image['path']) }}" alt="Galéria kép" 
                     data-bs-toggle="modal" data-bs-target="#imageModal" 
                     data-bs-image="{{ asset($image['path']) }}">
                </li>
            @endforeach
        </ul>
        <button id="next-slide" class="slide-button material-symbols-rounded">
          <img src="./img/icons/White_Double_Arrow_To_Up_Icon_Transparent_PNG-removebg-preview(1).svg" alt="">
        </button>
      </div>
      <div class="slider-scrollbar">
        <div class="scrollbar-track">
          <div class="scrollbar-thumb"></div>
        </div>
      </div>
    </div>
      

    {{-- \ GALLERY SECTION / --}}

    {{-- MODAL SECTION --}}

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content border-0">
            <div class="modal-header border-0">
                <button data-bs-theme="dark"  type="button" class=" btn-close   position-relative end-0 " id="modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body position-relative">
              <button type="button" class="btn btn-secondary position-absolute start-0 my-auto" id="prevImage" >&#10094;</button>
              <img id="modalImage" src="" alt="Selected Image" class="img-fluid mx-auto d-block ">
              <button type="button" class="btn btn-secondary position-absolute end-0 " id="nextImage" >&#10095;</button>
            </div>
          </div>
        </div>
    </div>
      

    {{-- <script id="barat_hud_sr_script">if(document.getElementById("fbarat")===null){var hst = document.createElement("script");hst.src = "//admin.fogyasztobarat.hu/h-api.js";hst.type = "text/javascript";hst.setAttribute("data-id", "T7CV4NBY");hst.setAttribute("id", "fbarat");var hs = document.getElementById("barat_hud_sr_script");hs.parentNode.insertBefore(hst, hs);}</script> --}}
    {{-- \ MODAL SECTION / --}}

    </x-slot:main>
    <x-slot:javaScript>
        <script src="js/index.js"></script>
    </x-slot:javaScript>
</x-layout>
