<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['idPanie','id','idPro','qteV','prixTTC'];
    protected $primaryKey = 'idPanie';
    public $timestamps = false;

    public function users(): BelongsTo
    {
        return $this->belongsTo(users::class);
    }
    public function produits(): BelongsTo
    {
        return $this->belongsTo(produits::class);
    }
}
