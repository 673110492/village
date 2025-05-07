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

    // Relation : un commentaire appartient à une culture
    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }
}
