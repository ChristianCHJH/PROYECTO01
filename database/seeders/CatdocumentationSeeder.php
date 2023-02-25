<?php

namespace Database\Seeders;

use App\Models\Documentation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatdocumentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documentation::create(['nombreCatgDoc' => 'CONTRATO','descCatg' => 'Documento de prestacion de servicio']);
        Documentation::create(['nombreCatgDoc' => 'HT','descCatg' => 'Docuemnto donde se encuntra la estructura del ht']);
        Documentation::create(['nombreCatgDoc' => 'PAM','descCatg' => 'Docuemnto donde se encuntra el cronograma de trapajos programados']);
    
    }
}
