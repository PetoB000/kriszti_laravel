<x-admin-layout>
    <x-slot:css></x-slot:css>
    <x-slot:main>
        <div class="container">
            <div class="row ">
                <div class="col d-flex justify-content-center">
                    <div class="btn btn-secondary" id="category-button">Kategóriák</div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="btn btn-secondary"  id="product-button">Termékek</div>

                </div>
                <div class="col d-flex justify-content-center">
                    <div class="btn btn-secondary" id="gallery-button">Galéria képek</div>
                </div>
            </div>
        </div>

        {{-- KATEGÓRIA --}}

        <div class="container d-none" id="categories">
            {{-- KATEGÓRIA HOZZÁADÁS --}}
                <div class="container">
                    <div class="row d-flex flex-column ">
                        <div class="col text-center my-5 py-2 bg-secondary text-white rounded rounded-3">Kategória Hozzáadása:</div>
                        <div class="col-12 col-md-8 d-flex mx-auto justify-content-center">
                            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="category-name" class="form-label">Kategória név:</label>
                                    <input type="text" class="form-control border border-2 border-black" required name="category-name" id="category-name">
                                </div>
                                <div class="mb-3">
                                    <label for="category-image" class="form-label">Kategória kép:</label>
                                    <input type="file" class="form-control border border-2 border-black" required name="category-image" id="category-image">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary mb-2">Hozzáadás</button>
                                </div>
                            </form>                         
                        </div>
                    </div>
                </div>
            {{-- \ KATEGÓRIA HOZZÁADÁS / --}}
            {{-- ÖSSZES KATEGÓRIA --}}
                <div class="container">
                    <div class="col text-center my-5 py-2 bg-secondary text-white rounded rounded-3">Meglévő kategóriák:</div>
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 mb-5">
                        
                        @foreach ($categories as $category)
                            <div class="col">
                                <div class="card">
                                    <img src="{{ $category->cover_image }}" class="card-img-top card_img" alt="{{ $category->name }} kép">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $category->name }}</h5>
                                      <div class="row">
                                        <div class="col">
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Módosítás</a>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('A kategóia törlésével kitörlöd a hozzá tartozó termékeket! \n Biztosan törölni szeretnéd?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Törlés</button>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            {{-- \ ÖSSZES KATEGÓRIA / --}}
        </div>

        {{-- KATEGÓRIA --}}

        {{-- TERMÉKEK --}}

        <div class="container" id="products">
            @foreach ($categories as $category)
                <div class="row">
                    <div class="col text-center my-5 py-2 bg-secondary text-white rounded rounded-3">{{ $category->name }}</div>
                    <div class="row d-flex row-cols-5">
                @foreach ($category->products as $product)
                    <div class="col">
                        <div class="card">
                            <img src="{{ $product->shownImg }}" class="card-img-top card_img" alt="{{ $product->name }} kép">
                            <div class="card-body">
                              <h5 class="card-title">{{ $product->name }}</h5>
                              <div class="row">
                                <!-- Edit Button -->
                                <div class="col">
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Módosítás</a>
                                </div>
                                <!-- Delete Button -->
                                <div class="col">
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Biztosan törölni szeretnéd a terméket?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Törlés</button>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                @endforeach
                </div>
                </div>
            @endforeach
        </div>
        

        {{-- TERMÉKEK --}}
    </x-slot:main>
    <x-slot:javaScript>
        <script src="js/admin.js"></script>
    </x-slot:javaScript>
</x-admin-layout>