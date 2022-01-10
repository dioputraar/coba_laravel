<?php

namespace Database\Seeders;

use App\Models\Ruang;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Ruang::factory(10)->create();
        Jabatan::factory(10)->create();
        User::factory(3)->create();
    }
}
