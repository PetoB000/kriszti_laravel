<x-layout>
    <x-slot:css>
        <link rel="stylesheet" href="css/category.css">
    </x-slot:css>
    <x-slot:main>
        
        <div class="container  my-5">
            <div class="row "><h1 class="d-flex justify-content-center">{{ $category->name }}</h1></div>
            <div class="row   my-4 row-cols-2">
                @foreach ($products as $product)
                <div class="col d-flex justify-content-center mb-2 product_container">
                    <div class="card p-0 " style="width: 18rem; background-color: lightgray;">
                        <img  src="{{ $product->shownImg }}" class="card-img-top rounded product_img" alt="{{ $product->name }}">
                        <div class="card-body">
                          <h5 class="card-title">{{ $product->name }}</h5>
                          <p class="card-text">Ára:  {{ $product->price }} Ft</p>
            
                          <a href="/Kategória-{category}-{product}" class="btn btn-outline-secondary w-50 mx-auto d-flex  justify-content-center">Megnézem</a>
                        </div>
                      </div>
                </div>
                    
                @endforeach
            </div>
        </div>


    </x-slot:main>
    <x-slot:javaScript></x-slot:javaScript>
</x-layout>