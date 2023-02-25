<?php

namespace Database\Seeders;

use App\Models\mese;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MesesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mese::create(['nomb_mes' => 'enero']);
        mese::create(['nomb_mes' => 'febrero']);
        mese::create(['nomb_mes' => 'marzo']);
        mese::create(['nomb_mes' => 'abril']);
        mese::create(['nomb_mes' => 'mayo']);
        mese::create(['nomb_mes' => 'junio']);
        mese::create(['nomb_mes' => 'julio']);
        mese::create(['nomb_mes' => 'agosto']);
        mese::create(['nomb_mes' => 'septiembre']);
        mese::create(['nomb_mes' => 'octubre']);
        mese::create(['nomb_mes' => 'noviembre']);
        mese::create(['nomb_mes' => 'diciembre']);
    }
}
