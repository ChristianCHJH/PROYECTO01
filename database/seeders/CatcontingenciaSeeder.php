<?php

namespace Database\Seeders;

use App\Models\Catcontingencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatcontingenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catcontingencia::create(['categoriaContin' => 'CONTINGENCIA POR PARTIDA','descripcion' => 'Se aplica cuando cada partida tiene un saldo de respaldo para cualquier eventualida el cual se va consumiendo.']);
        Catcontingencia::create(['categoriaContin' => 'CONTINGENCIA GENERAL','descripcion' => 'Se aplica cuando el saldo de respaldo es en general para todas las patidas aplicable para cualquier eventualida, el cual se va consumiendo.']);
        Catcontingencia::create(['categoriaContin' => 'CONTINGENCIA VARIABLE','descripcion' => 'Esta categoria hace referencia a un respaldo de monto 0.00, por tanto todos los trabajos realizados que inpacten a esta categoria de contingencia, se sumaran y se facturaran a fin de cada mes.']);
        Catcontingencia::create(['categoriaContin' => 'DIFERIDO','descripcion' => 'Hace referencia al saldo restante que pueda quedar del año pasado, el cual se incluye en el ht del año vigente, como saldo a favor el cual puede ser usado y consumido en los eventuales trabajos a realizar.']);
    
    }
}
