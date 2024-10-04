<x-admin-layout>
    <x-slot:css></x-slot:css>
    <x-slot:main>
        <div class="container mb-5">
            <h2>Termék hozzáadása a {{ $category->name }} kategóriához</h2>
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="category_id" value="{{ $category->id }}">

                <div class="mb-3">
                    <label for="name" class="form-label">Termék neve:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Termék leírás:</label>
                    <textarea name="description" id="description" class="form-control" style="height: 200px" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Termék ára:</label>
                    <input type="text" name="price" id="price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="shownImg" class="form-label">Termék kép:</label>
                    <input type="file" name="shownImg" id="shownImg" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="thumbnails" class="form-label">További termék képek:</label>
                    <input type="file" name="thumbnails[]" id="thumbnails" class="form-control" multiple>
                </div>

                <div class="mb-3">
                    <label for="buying_img" class="form-label">Termék kép a kosárhoz:</label>
                    <input type="file" name="buying_img" id="buying_img" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary d-flex mx-auto">Mentés</button>
            </form>
        </div>
    </x-slot:main>
    <x-slot:javaScript></x-slot:javaScript>
</x-admin-layout>
