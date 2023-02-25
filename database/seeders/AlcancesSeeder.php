<?php

namespace Database\Seeders;

use App\Models\Alcance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlcancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alcance::create(['provincia' => 'Amazonas']);
        Alcance::create(['provincia' => 'Áncash']);
        Alcance::create(['provincia' => 'Apurímac']);
        Alcance::create(['provincia' => 'Arequipa']);
        Alcance::create(['provincia' => 'Ayacucho']);
        Alcance::create(['provincia' => 'Cajamarca']);
        Alcance::create(['provincia' => 'Cusco']);
        Alcance::create(['provincia' => 'Huancavelica']);
        Alcance::create(['provincia' => 'Huánuco']);
        Alcance::create(['provincia' => 'Ica']);
        Alcance::create(['provincia' => 'Junín']);
        Alcance::create(['provincia' => 'La Libertad']);
        Alcance::create(['provincia' => 'Lambayeque']);
        Alcance::create(['provincia' => 'Lima']);
        Alcance::create(['provincia' => 'Loreto']);
        Alcance::create(['provincia' => 'Madre de Dios']);
        Alcance::create(['provincia' => 'Moquegua']);
        Alcance::create(['provincia' => 'Pasco']);
        Alcance::create(['provincia' => 'Piura']);
        Alcance::create(['provincia' => 'Puno']);
        Alcance::create(['provincia' => 'San Martín']);
        Alcance::create(['provincia' => 'Tacna']);
        Alcance::create(['provincia' => 'Tumbes']);
        Alcance::create(['provincia' => 'Ucayali']);
        Alcance::create(['provincia' => 'Trujillo']);
        Alcance::create(['provincia' => 'Arequipa']);
    }
}
