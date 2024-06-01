<?php

namespace App\Models;

use App\Models\categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'qte_stock',
    ];

    public function categorie(){
        return $this->belongsTo(categorie::class);
    }
}
