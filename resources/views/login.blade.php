<x-admin-layout>
    <x-slot:css></x-slot:css>
    <x-slot:main>
        <div class="container">
            <div class="row mt-5">
                <div class="col-12 col-md-8 col-lg-4 mx-auto">
                    <form class="mt-5 bg-white p-3 border border-black rounded rounded-3" method="POST" action="{{ route('login') }}">
                        @csrf 
                        <div class="mb-3">
                            <label for="username" class="form-label">Felhasználónév</label>
                            <input type="text" class="form-control border border-2 border-black" required name="username" id="username" aria-describedby="usernameHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Jelszó</label>
                            <input type="password" class="form-control border border-2 border-black" required name="password" id="password">
                        </div>
                        <button type="submit" class="mx-auto d-flex btn btn-primary">Bejelentkezés</button>
                    </form>
                </div>
            </div>
        </div>
    </x-slot:main>
    <x-slot:javaScript></x-slot:javaScript>
</x-admin-layout>
