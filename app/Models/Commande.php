<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commandes'; 

    protected $primaryKey = 'idCom';

    protected $fillable = [ 
        'id',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
        'idPanie',
        'dateCom',
    ];

    public $timestamps = false; 

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function panie()
    {
        return $this->belongsTo(Panie::class, 'idPanie');
    }
}
