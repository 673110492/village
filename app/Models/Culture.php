<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'origine',
        'description',
        'type',
        'date_celebration',
        'lieu_celebration',
        'image',
        'video',
    ];

    // Relation : une culture a plusieurs commentaires
    public function commentaires()
    {
        return $this->hasMany(Culturecommentaire::class);
    }
}
