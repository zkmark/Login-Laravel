<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Truncamos la tabla para no repetir datos
      DB::table('users')->truncate();

      //Usamos el modelfactory, 
      factory(App\User::class)->create([
          'name' => 'root',
          'email' => 'root@hotmail.com',
          'password' => bcrypt('root'),
          'role' => 'admin'
      ]);
      //modelo, cantidad usuarios, metodo create
    	factory(App\User::class, 9)->create();
			
			//migrar seed php artisan migrate --seed
    }
}
