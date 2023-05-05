<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier un article
        </h1>
    </x-slot>

    <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Nom :</label><br>
                    <input type="text" name="name" id="name" value=""
                           class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <label for="price">Prix :</label><br>
                    <input type="text" name="price" id="price" value=""
                           class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <label for="picture">Illustration :</label>
                    <input type="file" name="picture" id="picture">
                    <br>
                    <label for="description">Description :</label>
                    <textarea name="description" id="description" rows=5
                              class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        <label for="categorie">categorie :</label><br>
                        <select name="categorie" id="categorie">
                            <option value="value1">1</option>
                            <option value="value2">2</option>
                            <option value="value3">3</option>
                            <option value="value4">4</option>
                        </select> 
                    <x-primary-button class="mt-4">{{ __('Publier') }}</x-primary-button>
                    <a href="{{ route('admin') }}">Retour</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
