<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'titre' => $this->faker->sentence,
            'contenu' => $this->faker->paragraph,
            'date' => $this->faker->dateTime,
            'etudiant_id' => Etudiant::factory(),
        ];
    }
}
