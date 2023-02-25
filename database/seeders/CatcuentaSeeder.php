<?php

namespace Database\Seeders;

use App\Models\Catcuenta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatcuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catcuenta::create(['CatgEmpresa' => 'FACILITY']);
        Catcuenta::create(['CatgEmpresa' => 'PROPERTY']);
    }
}
