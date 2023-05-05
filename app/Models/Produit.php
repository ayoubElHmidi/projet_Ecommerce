<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $table = 'Produits'; 

    protected $primaryKey = 'idPro';

    protected $fillable = [ 
        'nomPro',
        'descriptionPro',
        'photo',
        'prixPro',
        'qtePro',
        'idCat',
    ];
    public $timestamps = false;
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'idCat');
    }
    public function panies()
{
    return $this->hasMany(Panie::class, 'idPro');
}
}
