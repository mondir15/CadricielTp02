<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Définir les relations avec d'autres modèles
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    // Définir les attributs supplémentaires
    protected $fillable = [
        'title_fr' ,
        'title_en' ,
        'content_fr',
        'content_en',
        'user_id',
    ];
}

