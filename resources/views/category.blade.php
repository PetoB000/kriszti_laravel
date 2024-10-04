


<x-layout>
    <x-slot:css>
        <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    </x-slot:css>
    <x-slot:main>
        
        <div class="container  my-5">
            <div class="row "><h1 class="d-flex justify-content-center">{{ $category->name }}</h1></div>
            <div class="row d-flex  my-4 row-cols-2 row-cols-lg-3">
                @foreach ($category->products as $product)
                <div class="col  d-flex mx-auto justify-content-center mb-2 product_container">
                    <div class="card p-0 " style="width: 18rem; background-color: lightgray;">
                        <img  src="{{ asset($product->shownImg) }}" class="card-img-top rounded product_img" alt="{{ $product->name }}">
                        <div class="card-body">
                          <h5 class="card-title">{{ $product->name }}</h5>
                          <p class="card-text">Ára: <span class="category_price">{{ $product->price }}</span></p>
            
                          <a href="/Termék/{{ $product->id }}" class="btn btn-outline-secondary w-50 mx-auto d-flex  justify-content-center">Megnézem</a>
                        </div>
                      </div>
                </div>
                    
                @endforeach
            </div>
        </div>


    </x-slot:main>
    <x-slot:javaScript></x-slot:javaScript>
</x-layout>