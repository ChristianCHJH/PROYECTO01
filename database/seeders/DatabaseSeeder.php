<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        
        $this->call(MesesSeeder::class);
        $this->call(AlcancesSeeder::class);
        $this->call(CatcuentaSeeder::class);
        $this->call(CatdocumentationSeeder::class);
        $this->call(CatcontingenciaSeeder::class);
        $this->call(RoleSeeder::class);

    }
}
