<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'nom', 'email', 'message', 'is_approved'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
