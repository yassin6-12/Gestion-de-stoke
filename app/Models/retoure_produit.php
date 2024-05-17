<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class retoure_produit extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_produit',
        'id_client',
        'total',
        'created_at'
    ];
}
