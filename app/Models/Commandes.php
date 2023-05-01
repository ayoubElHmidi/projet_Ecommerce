<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['idCom','id','idPanie','dateCom','categorie'];
    protected $primaryKey = 'idCom';
    public $timestamps = false;


    public function users(): BelongsTo
    {
        return $this->belongsTo(users::class);
    }
    public function panies(): BelongsTo
    {
        return $this->belongsTo(panies::class);
    }
}
