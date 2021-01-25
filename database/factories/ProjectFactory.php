<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"      =>  $this->faker->name,
            "excerpt"   =>  $this->faker->text(40),
            "content"   =>  $this->faker->text(1000),
            "user_id"   =>  User::all()->random()->id,
        ];
    }
}
