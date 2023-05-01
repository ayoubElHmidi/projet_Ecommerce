<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['idCat','nomCat','descriptionCat','photoCat'];
    protected $primaryKey = 'idCat';
    public $timestamps = false;
    
}
