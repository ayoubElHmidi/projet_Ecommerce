<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panie extends Model
{
    use HasFactory;

    protected $table = 'panies'; // nom de la table

    protected $primaryKey = 'idPanie'; // nom de la clé primaire

    protected $fillable = [ // liste des colonnes modifiables
        'id',
        'idPro',
        'qteV',
        'prixTTC',
    ];

    public $timestamps = false; // ignore le timestamp

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'idPro');
    }
    public function commandes()
{
    return $this->hasMany(Commande::class, 'idPanie');
}

}
