@include('fireshop.admin.nav')

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .table-container {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 100px;
        height: auto;
    }

    .total-row {
        font-weight: bold;
    }

    .form-container {
        margin-top: 20px;
    }

    label {
        font-weight: bold;
    }

    select {
        margin-right: 10px;
    }

    .success-message {
        color: green;
    }
    select {
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

button:active {
    background-color: #3e8e41;
}

</style>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Photo</th>
                <th>Nom du produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resultats as $resultat)
            <tr>
                <td><img src="{{ asset($resultat->photo) }}" alt="Photo du produit"></td>
                <td>{{ $resultat->nomPro }}</td>
                <td>{{ $resultat->prixPro }}</td>
                <td>{{ $resultat->qteC }}</td>
                <td>{{ $resultat->prixTTC }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="4">Total de la commande :</td>
                <td>{{ $resultats->sum('prixTTC') }}</td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="form-container">
    <form action="{{ route('modifierEtatCommande') }}" method="POST">
        @csrf
        <input type="hidden" name="commandeId" value="{{ $resultats->first()->idCom }}">
        <label for="etatCommande" class="form-label">Modifier l'état de la commande :</label>
        <select name="etatCommande" id="etatCommande" class="form-select">
            <option value="en_attente" {{ $resultats->first()->etat == 'en_attente' ? 'selected' : '' }}>En attente</option>
            <option value="en_cours" {{ $resultats->first()->etat == 'en_cours' ? 'selected' : '' }}>En cours</option>
            <option value="terminee" {{ $resultats->first()->etat == 'terminee' ? 'selected' : '' }}>Terminée</option>
        </select>
        <button type="submit" class="form-button">Modifier</button>
    </form>
</div>

