<x-admin-layout>
    <x-slot:css></x-slot:css>
    <x-slot:main>
        <div class="container">
            <h2>Kategória módositás</h2>
        
            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        
                <div class="mb-3">
                    <label for="category-name" class="form-label">Kategória név</label>
                    <input type="text" name="category-name" class="form-control" value="{{ $category->name }}" required>
                </div>
        
                <div class="mb-3">
                    <label for="category-image" class="form-label">Kategória kép</label>
                    <input type="file" name="category-image" class="form-control mb-2">
                    <small class="form-text text-muted">Jelenlegi kép: <img src="{{ asset($category->cover_image) }}" width="100" alt="{{ $category->name }}"></small>
                </div>
        
                <button type="submit" class="btn btn-primary mb-5">Változtatás</button>
            </form>
        </div>
    </x-slot:main>
    <x-slot:javaScript></x-slot:javaScript>
</x-admin-layout>


