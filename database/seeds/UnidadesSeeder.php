<?php

use Illuminate\Database\Seeder;
use App\Unidad;

class UnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Unidad::create([
          'nombre' => 'BLOCK'
      ]);
      Unidad::create([
          'nombre' => 'BOLSA'
      ]);
      Unidad::create([
          'nombre' => 'BOTE'
      ]);
      Unidad::create([
          'nombre' => 'CAJA'
      ]);
      Unidad::create([
          'nombre' => 'CIENTO'
      ]);
      Unidad::create([
          'nombre' => 'JUEGO'
      ]);
      Unidad::create([
          'nombre' => 'KILO'
      ]);
      Unidad::create([
          'nombre' => 'LITRO'
      ]);
      Unidad::create([
          'nombre' => 'METRO'
      ]);
      Unidad::create([
          'nombre' => 'PAQUETE'
      ]);
      Unidad::create([
          'nombre' => 'PAR'
      ]);
      Unidad::create([
          'nombre' => 'PIEZA'
      ]);

    }
}
