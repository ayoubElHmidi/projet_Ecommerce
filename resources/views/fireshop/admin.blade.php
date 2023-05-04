<x-app-layout>

    <header>
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                    Dashboard admin
                </div>
            </div>
        </div>
    </header>

    <main class="my-8">
        <div class="w-full text-gray-700 text-2xl font-semibold">
            Produits
        </div>
    
        <div class="w-full text-gray-700 text-xl font-semibold">
            <a href="{{ route('admin.create') }}">
                Ajouter un admin
            </a>
        </div>
        <hr>
        <br>
            </main>

</x-app-layout>
