<?php

namespace Database\Factories;

use App\Models\Operation;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class OperationFactory extends Factory
{
    /**
     * The name of the "table" associated with the model.
     *
     * @var string
     */
    protected $model = Operation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sum' => $this->faker->randomFloat(2, 10, 1000),
            'seller_id' => Organization::factory()->create()->id,
            'buyer_id' => Organization::factory()->create()->id,
        ];
    }
}
