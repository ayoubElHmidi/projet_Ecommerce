<x-app-layout>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="card-title">
                        <a href="{{ route('products.show', $product) }}">
                            {{ $product->name }}
                        </a>
                    </h2>
                    <img src="{{ asset($product->picture) }}" alt="{{ $product->name }}" class="card-img-top rounded" style="width: 200px; height: 200px;">
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">{{ $product->price }} €</p>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Modifier</a>
                    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('products.destroy', $product->id) }}"
                            onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-danger">
                            Supprimer
                        </a>
                    </form>
                </div>
            </div>
        </div>
</div>
</x-app-layout>
