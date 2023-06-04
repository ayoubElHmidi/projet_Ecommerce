@include('layouts.navbarhome')
<!-- Affichage des produits du panier -->
@if (Auth::check())
@if ($panier)
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>photo</th>
                        <th>nom produit</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($panier as $element)
                    <tr>
                    <td class="align-middle"><img src="{{ isset($element['photo']) ? $element['photo'] : '' }}"style="width: 50px;" alt="Product Image" > </td>
                    <td class="align-middle">{{ isset($element['nomPro']) ? $element['nomPro'] : '' }}</td>
                    <td class="align-middle">${{ isset($element['prixPro']) ? $element['prixPro'] : '' }}</td>
                    <td class="align-middle">
                        <div class="input-group quantity mx-auto " style="width: 10px color:'red';">
                            <input type="number" value="{{ isset($element['qteV']) ? $element['qteV'] : '' }}" data-element-id="{{ isset($element['idPanie']) ? $element['idPanie'] : '' }}" class="quantite-input" min=1>
                        </div>
                    <td class="align-middle">${{ $element['prixTTC'] }}</td>
                    <td class="align-middle"><button class="supprimer-produit" data-element-id="{{ isset($element['idPanie']) ? $element['idPanie'] : '' }}"><i class="fa fa-times"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                  <p>Panier vide.</p>
            @endif
@else
    <a href="{{ route('login') }}">Se connecter</a>
@endif
        </div>
    </div>
</div>
<div class="col-lg-4">

    <div class="card border-secondary mb-5">

        <div class="card-footer border-secondary bg-transparent">
            <div class="d-flex justify-content-between mt-2">
                <h5 class="font-weight-bold">Total</h5>
                <h5 class="font-weight-bold">${{ $prixTotal }}</h5>
            </div>
            <form method="GET" action="{{ route('checkout.index') }}">
                <button class="btn btn-block btn-primary my-3 py-3" type="submit">Checkout</button>
            </form>
                    </div>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Supprimer un produit du panier (pour utilisateur connecté)
        $('.supprimer-produit').click(function() {
            var elementId = $(this).data('element-id');
            var url = '{{ route("panier.supprimerProduit") }}';

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id_element_panier: elementId
                },
                success: function(response) {
                    // Rafraîchir la page ou mettre à jour l'affichage des produits du panier
                    window.location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        // Supprimer un élément du panier (pour utilisateur non connecté)


        // Mettre à jour la quantité d'un produit dans le panier
        $('.quantite-input').change(function() {
            var elementId = $(this).data('element-id');
            var nouvelleQuantite = $(this).val();
            var url = '{{ route("panier.mettreAJour") }}';

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id_element_panier: elementId,
                    nouvelle_quantite: nouvelleQuantite
                },
                success: function(response) {
                    // Rafraîchir la page ou mettre à jour l'affichage des produits du panier
                    window.location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>