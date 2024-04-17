<?php

namespace App\Models;

use App\Models\categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;

    public function categorie(){
        return $this->belongsTo(categorie::class);
    }
}
