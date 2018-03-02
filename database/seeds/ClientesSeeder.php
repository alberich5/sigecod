<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Cliente::create([
          'id_usuario' => '1',
          'nombre' => 'COMUNICACION',
          'fecha' => '2018-03-02'
      ]);
      Cliente::create([
          'id_usuario' => '1',
          'nombre' => 'RECLUTAMIENTO',
          'fecha' => '2018-03-02'
      ]);
      Cliente::create([
          'id_usuario' => '1',
          'nombre' => 'AUDITORIA',
          'fecha' => '2018-03-02'
      ]);
      Cliente::create([
          'id_usuario' => '1',
          'nombre' => 'FINANCIEROS',
          'fecha' => '2018-03-02'
      ]);
      Cliente::create([
          'id_usuario' => '1',
          'nombre' => 'RECURSOS HUMANOS',
          'fecha' => '2018-03-02'
      ]);
      Cliente::create([
          'id_usuario' => '1',
          'nombre' => 'JURIDICO',
          'fecha' => '2018-03-02'
      ]);
      Cliente::create([
          'id_usuario' => '1',
          'nombre' => 'SISTEMAS',
          'fecha' => '2018-03-02'
      ]);
      Cliente::create([
          'id_usuario' => '1',
          'nombre' => 'SERVICIOS',
          'fecha' => '2018-03-02'
      ]);
      Cliente::create([
          'id_usuario' => '1',
          'nombre' => 'COBRANZAS',
          'fecha' => '2018-03-02'
      ]);
      Cliente::create([
          'id_usuario' => '1',
          'nombre' => 'COMERCIALIZACION',
          'fecha' => '2018-03-02'
      ]);
    }
}
