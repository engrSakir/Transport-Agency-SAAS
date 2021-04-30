<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->type = 'Super Admin';
        $user->name = 'Super Admin';
        $user->email = 'superadmin@gmail.com';
        $user->password = Hash::make('password');
        $user->save();

        $user = new User();
        $user->type = 'Admin';
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('password');
        $user->save();

        $user = new User();
        $user->type = 'Manager';
        $user->name = 'Manager';
        $user->email = 'manager@gmail.com';
        $user->password = Hash::make('password');
        $user->save();

        $user = new User();
        $user->type = 'Customer';
        $user->name = 'Customer';
        $user->email = 'customer@gmail.com';
        $user->password = Hash::make('password');
        $user->save();

        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->type = 'Super Admin';
            $user->name = 'Mr Super Admin '.$i;
            $user->email = 'superadmin'.$i.'@gmail.com';
            $user->password = Hash::make('password');
            $user->save();

            $user->assignRole('Super Admin');
        }

        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->type = 'Admin';
            $user->name = 'Mr Admin '.$i;
            $user->email = 'admin'.$i.'@gmail.com';
            $user->password = Hash::make('password');
            $user->save();
            $user->assignRole('Admin');
        }

        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->type = 'Manager';
            $user->name = 'Mr Manager '.$i;
            $user->email = 'manager'.$i.'@gmail.com';
            $user->password = Hash::make('password');
            $user->save();
            $user->assignRole('Admin');
        }

        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->type = 'Customer';
            $user->name = 'Mr Customer '.$i;
            $user->email = 'customer'.$i.'@gmail.com';
            $user->password = Hash::make('password');
            $user->save();
            $user->assignRole('Admin');
        }
    }
}
