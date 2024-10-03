<x-admin-layout>
    <x-slot:css></x-slot:css>
    <x-slot:main>
        <div class="container">
            <div class="row ">
                <div class="col d-flex justify-content-center">
                    <div class="btn btn-secondary">Kategóriák</div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="btn btn-secondary">Termékek</div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="btn btn-secondary">Galéria képek</div>
                </div>
            </div>
        </div>
        <div class="container">
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
                    <div class="row row-cols-5 mb-5">
                        
                        @foreach ($categories as $category)
                            <div class="col">
                                <div class="card">
                                    <img src="{{ $category->cover_image }}" class="card-img-top card_img" alt="{{ $category->name }} kép">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $category->name }}</h5>
                                      <div class="row">
                                        <div class="col btn btn-primary">Módosítás</div>
                                        <div class="col btn btn-danger">Törlés</div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            {{-- \ ÖSSZES KATEGÓRIA / --}}
        </div>
    </x-slot:main>
    <x-slot:javaScript></x-slot:javaScript>
</x-admin-layout>