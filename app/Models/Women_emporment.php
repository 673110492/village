<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Women_emporment extends Model
{

    use HasFactory;

     protected $fillable = [
        'title',
        'edition',
        'description',
        'lien_youtube1',
        'lien_youtube2',
        'image1',
        'image2',
        'start_date',
        'status',
    ];
}
