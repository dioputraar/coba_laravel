<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Ruang;
use Illuminate\Database\Eloquent\Factories\Factory;

class RuangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Ruang::idOtomatis(),
            'nama' => 'Ruang '.mt_rand(1,100),
            'kapasitas' => mt_rand(1,50),
            'lantai' => mt_rand(1,3),
            'status' => 1,
            'creadate' => Carbon::now('Asia/Jakarta'),
            'modidate' => Carbon::now('Asia/Jakarta'),
        ];
    }
}
