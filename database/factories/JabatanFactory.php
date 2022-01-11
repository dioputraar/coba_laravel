<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class JabatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jabatan' => $this->faker->jobTitle(),
            'status' => 1,
            'creadate' => Carbon::now('Asia/Jakarta'),
            'modidate' => Carbon::now('Asia/Jakarta'),
        ];
    }
}
