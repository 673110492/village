<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'reference',
        'image1',
        'image2',
        'lien_youtube1',
        'lien_youtube2',
    ];

    public function culturecommentaires()
    {
        return $this->hasMany(Culturecommentaire::class, 'culture_id');
    }
}