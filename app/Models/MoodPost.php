<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoodPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'mood_id',
    ];

    public function images()
    {
        return $this->hasMany(MoodImage::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mood()
    {
        return $this->belongsTo(Mood::class);
    }
}

