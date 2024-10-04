<x-admin-layout>
    <x-slot:css></x-slot:css>
    <x-slot:main>
        <div class="container mb-5">
            <h2>Termék módositása: {{ $product->name }}</h2>
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Termék neve:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Termék leírás:</label>
                    <textarea type="text" name="description" id="description" class="form-control"  style="height: 200px" required>{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Termék ár:</label>
                    <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Termék kategória:</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="shownImg" class="form-label">Termék kép:</label>
                    <input type="file" name="shownImg" id="shownImg" class="form-control">
                    <small class="form-text text-muted">Jelenlegi kép: <img src="{{ asset($product->shownImg) }}" width="100" alt="{{ $product->name }}"></small>
                </div>

                <div class="mb-3">
                    <label for="thumbnails" class="form-label">További termék képek:</label>
                    <input type="file" name="thumbnails[]" id="thumbnails" class="form-control" multiple>
                    <small class="form-text text-muted d-flex">Jelenlegi képek: 
                        @foreach($product->thumbnails as $thumbnail)
                            <div class="form-check d-flex flex-column">
                                <img src="{{ asset($thumbnail->path) }}" width="100" alt="{{ $product->name }}">
                                <input type="checkbox" name="{{ $thumbnail->id }}" class="btn-check" id="{{ $thumbnail->id }}" autocomplete="off">
                                <label class="btn btn-outline-danger" for="{{ $thumbnail->id }}">Törlés</label>
                            </div>
                        @endforeach

                    </small>
                </div>

                <div class="mb-3">
                    <label for="buying_img" class="form-label">Termék kép a kosárhoz:</label>
                    <input type="file" name="buying_img" id="buying_img" class="form-control">
                    <small class="form-text text-muted">Jelenlegi kép: <img src="{{ asset($product->buying_img) }}" width="100" alt="{{ $product->name }}"></small>
                </div>

                <button type="submit" class="btn btn-primary d-flex mx-auto">Mentés</button>
            </form>
        </div>
    </x-slot:main>
    <x-slot:javaScript></x-slot:javaScript>
</x-admin-layout>


