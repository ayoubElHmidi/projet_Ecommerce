<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduitCommande extends Model
{
    protected $table = 'produits_commandes';
    protected $primaryKey = 'idProCom';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'idCom',
        'idPro',
        'qteC',
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'idCom', 'idCom');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'idPro', 'idPro');
    }
}
