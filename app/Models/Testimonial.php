<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = ['photo', 'name', 'contenu'];

    public function translations()
    {
        return $this->hasMany(TestimonialTranslation::class);
    }

    public function translate($locale)
    {
        return $this->translations()->where('locale', $locale)->first();
    }
}
