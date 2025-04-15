<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'image', 'description'];

    public function translations()
    {
        return $this->hasMany(ProjectTranslation::class);
    }

    public function translate($locale)
    {
        return $this->translations()->where('locale', $locale)->first();
    }
}
