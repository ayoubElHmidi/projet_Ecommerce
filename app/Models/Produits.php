<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['idPro','nomPro','descriptionPro','photo','prixPro','qtePro','idCat'];
    protected $primaryKey = 'idPro';
    public $timestamps = false;
    
    
    
    public function categories(): BelongsTo
    {
        return $this->belongsTo(categories::class);
    }
}
