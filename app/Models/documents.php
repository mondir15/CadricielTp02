<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    use HasFactory;
    protected $fillable = [
        'filename_fr',
        'filename_en',
        'user_id',
        'path',
        'lang'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
