<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'       => User::all()->random()->id,
            'category_id'   => Category::all()->random()->id,
            'title'         => $this->faker->sentence(mt_rand(2,8)),
//            'description'   => '<p>'.implode('<p></p>', $this->faker->paragraphs(mt_rand(5,10))).'</p>',
            'description'   => collect($this->faker->paragraphs(mt_rand(5,10)))
                                ->map(fn($p) => "<p>$p</p>")
                                ->implode(''),
            'image'         => Str::random(5)
        ];
    }
}
