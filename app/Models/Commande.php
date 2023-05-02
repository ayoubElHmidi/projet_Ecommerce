<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commandes'; // nom de la table

    protected $primaryKey = 'idCom'; // nom de la clé primaire

    protected $fillable = [ // liste des colonnes modifiables
        'id',
        'idPanie',
        'dateCom',
    ];

    public $timestamps = false; // ignore le timestamp

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function panie()
    {
        return $this->belongsTo(Panie::class, 'idPanie');
    }
}
