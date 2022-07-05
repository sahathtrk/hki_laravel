<?php

namespace Database\Seeders;

use App\Models\Akun;
use App\Models\Dokumen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        
        Akun::factory(5)->create();
        Dokumen::factory(5)->create();
    }
}
