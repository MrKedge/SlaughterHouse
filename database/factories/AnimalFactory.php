<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Animal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['cow', 'carabao', 'horse', 'swine']),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'age' => $this->faker->numberBetween(1, 10),
            'live_weight' => $this->faker->numberBetween(50, 200),
            'destination' => $this->faker->randomElement([
                'meat shops',
                'meat cutting',
                'hotel and restaurant',
                'supermarket',
                'meat processing plant',
                'cold storage',
            ]),
            'butcher' => 'public',
            'age_classify' => $this->faker->word,
            'cert_ownership' => $this->faker->word,
            'animal_mark' => $this->faker->word,
            'cert_transfer' => $this->faker->word,
            'status' => $this->faker->randomElement(['pending', 'approved']),
            'source' => $this->faker->randomElement(['within the province', 'outside the province']),
            'user_id' => User::factory(),
        ];
    }
}
