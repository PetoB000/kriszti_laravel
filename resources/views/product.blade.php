<x-layout>
    <x-slot:css>
        <link rel="stylesheet" href="css/products.css">
    </x-slot:css>
    <x-slot:main>
        <div class="container-fluid px-3 my-5" id="container-fluid">
            <div class="row h2 d-flex mx-auto justify-content-center mb-4" id="name">{{ $product->name }}</div>
            <div class="row d-flex flex-column flex-lg-row">
                <div class="col-12 col-sm-8 col-lg-5 mb-5 mb-lg-0 d-flex  mx-auto">
                    <div id="carouselExampleIndicators" class="carousel slide" >
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        @if (!empty($product->thumbnails))
                            @for($i = 1 ; $i < count($product->thumbnails); $i++)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
                            @endfor

                        @endif

                        @if (count($product->thumbnails) === 1) 
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>  
                        @endif
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{ $product->shownImg }}"  class="d-block w-100 carousel_image" alt="{{ $product->name }}">
                          </div>

                          @if (!empty($product->thumbnails))
                            @for ($i = 1;  $i < count($product->thumbnails); $i++)
                                <div class="carousel-item  ">
                                    <img src="{{ $product->thumbnails[$i]->path }}" class="d-block w-100 carousel_image" alt="{{ $product->name }}">
                                </div>
                            @endfor
                              
                          @endif

                        @if (count($product->thumbnails) === 1) 
                            <div class="carousel-item">
                                <img src="{{ $product->thumbnails[0]->path }}" class="d-block w-100" alt="{{ $product->name }}">
                            </div>
                        @endif
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
                <div class="col-12 col-lg-7  mb-5">
                    <div class="row px-3 px-lg-0 " >{!! $product->description !!}</div>
                    <div class="row px-3 px-lg-0 " ><span class="p-0 fs-4 fw-semibold">Fontos!</span>Az epoxy terméket ne tedd ki közvetlen forróságnak, napsütésnek és extrém hidegnek sem, mert ezek mind minőségromláshoz vezethetnek. <br>
                        Tisztítás: nedves, mosószeres ruhával</div>
                    <div class="row  px-3 px-lg-0  d-flex price-div" >
                        <div class="col d-flex justify-content-end">Ára:  <span class="ms-1" id="price_span"> {{ $product->price }}</span></div>
                        <div class="col"><span id="to_basket" class="">Kosárba</span></div> 
                    </div>
            
                </div>
            </div>
        </div>
        <div class="d-none" id="shownImg">{{ $product->shownImg }}</div>
        <div class="d-none" id="buyingImg">{{ $product->buying_img }}</div>
        <div class="d-none" id="pId">{{ $product->id }}</div>
        <div class="d-none" id="pPrice">{{ $product->price }}</div>
    </x-slot:main>
    <x-slot:javaScript>
        <script src="js/products.js"></script>
    </x-slot:javaScript>
</x-layout>