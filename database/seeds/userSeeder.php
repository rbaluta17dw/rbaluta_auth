<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class userSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $role_user = Role::where('name', 'user')->first();
    $role_admin = Role::where('name', 'admin')->first();
    $role_premium = Role::where('name', 'premium')->first();

    $user = new User;
    $user->name = 'Ander';
    $user->email = 'anderlabo@gmail.com';
    $user->password = bcrypt('123456');
    $user->save();
    $user->roles()->attach($role_user);

    $admin = new User;
    $admin->name = 'Robert';
    $admin->email = 'robertba@gmail.com';
    $admin->password = bcrypt('123456');
    $admin->save();
    $admin->roles()->attach($role_admin);

    $premium = new User;
    $premium->name = 'Ibai';
    $premium->email = 'ibaialb@gmail.com';
    $premium->password = bcrypt('123456');
    $premium->save();
    $premium->roles()->attach($role_premium);

  }
}
