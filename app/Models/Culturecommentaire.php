<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culturecommentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'culture_id',
        'auteur',
        'contenu',
        'photo',
    ];

     protected $table = 'culturecommentaires';

    // Définir la relation inverse si besoin
    public function culture()
    {
        return $this->belongsTo(Culture::class, 'culture_id');
    }
   
}