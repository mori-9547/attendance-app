<?php

namespace Database\Factories;

use App\Models\WorkTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkTimeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkTime::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_time' => '10:00:00',
            'end_time' => '19:00:00',
            'rest_time' => '01:00:00'
        ];
    }
}
