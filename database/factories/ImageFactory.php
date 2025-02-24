<?php

namespace Database\Factories;


use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $post = Post::factory()->create();
        return [
            'imageable_id' => $post->id,
            'imageable_type' => 'App\Models\Post',
            'original' => $this->faker->imageURL(1024,800),
            'large' => $this->faker->imageURL(1024,800),
            'medium'=> $this->faker->imageURL(600,375),
            'small'=> $this->faker->imageURL(100,100),
        ];
    }
}
