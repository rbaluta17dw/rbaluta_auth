<?php

use Illuminate\Database\Seeder;
use App\Role;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new Role;
      $user->name = 'user';
      $user->save();

      $admin = new Role;
      $admin->name = 'admin';
      $admin->save();

      $premium = new Role;
      $premium->name = 'premium';
      $premium->save();
    }
}
