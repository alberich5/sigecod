<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');
        for ($i = 0; $i < 50; $i++) {
            $id = \DB::table('users')->insertGetId([
                    $name = 'name' => $faker->firstName,
                    'email' => $faker->unique()->safeEmail,
                    'password' => bcrypt(123456),
                    'rol' => 'user',
                    'remember_token' => bcrypt(date('YmdHms'))
                ]
            );

            \DB::table('posts')->insert([
                'id_usuario' => $id,
                'nombre_usuario'=>$faker->firstName,
                'contenido' => $faker->paragraph(rand(2, 5))
            ]);
        }
    }
}
