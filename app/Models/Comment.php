<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'chirp_id', 'comment'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function chirp()
    {
        return $this->belongsTo(Chirp::class);
    }
}
