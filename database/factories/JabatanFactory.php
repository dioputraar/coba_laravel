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
            'jabatan' => 'Jabatan. '.mt_rand(1,100),
            'status' => 1,
            'creadate' => Carbon::now('Asia/Jakarta'),
            'modidate' => Carbon::now('Asia/Jakarta'),
        ];
    }
}
