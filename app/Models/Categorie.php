<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categories'; // nom de la table

    protected $primaryKey = 'idCat'; // nom de la clé primaire

    protected $fillable = [ // liste des colonnes modifiables
        'nomCat',
        'descriptionCat',
        'photoCat',
    ];

    public $timestamps = false; // ignore le timestamp

    public function produits()
    {
        return $this->hasMany(Produit::class, 'idCat');
    }
}
