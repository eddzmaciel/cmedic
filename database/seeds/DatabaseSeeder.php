<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use database\seeds\BancosTableSeeder; 
use database\seeds\MonedasTableSeeder; 
use database\seeds\MetodospagoTableSeeder; 
use database\seeds\CuentasContablesTableSeeder; 
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        DB::table('users')->insert(array(
            'name' => 'Medical',
            'email' => 'medical@gmail.com',
            'password' => Hash::make('123456'),            
            'role_id' => 1,
            'id_sucursal' => 1,
            'avatar' => 'logo-avatar.png',
            'direccion' => 'prueba',
            'telefono' => '1234567890',
        ));

        DB::table('roles')->insert(array(
            'id'            => 1,
            'name'          => 'administrador',
            'description'   => 'Perfil Administrador contable, el cual puede realizar todo tipo de acciones sobre el.'
        ));

  

        exit('Los seeder han sido cargados correctamente');
	}

}
