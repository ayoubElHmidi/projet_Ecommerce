<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = ['name', 'email', 'phone', 'subject', 'message'];
    protected $primaryKey ='idC';
    public $timestamps = false;
    
}
