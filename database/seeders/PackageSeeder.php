<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //1
            $package = new Package();
            $package->name = 'Package - 1';
            $package->price =  800;
            $package->branch = 5;
            $package->admin = 2;
            $package->manager = 5;
            $package->duration = 30;
            $package->price_per_message =  0.45;
            $package->free_sms = 0;
            $package->is_active =  1;
            $package->save();

        //2
        $package = new Package();
        $package->name = 'Package - 2';
        $package->price =  1200;
        $package->branch = 8;
        $package->admin = 2;
        $package->manager = 10;
        $package->duration = 30;
        $package->price_per_message =  0.45;
        $package->free_sms = 0;
        $package->is_active =  1;
        $package->save();

        //3
        $package = new Package();
        $package->name = 'Package - 3';
        $package->price =  1600;
        $package->branch = 12;
        $package->admin = 2;
        $package->manager = 14;
        $package->duration = 30;
        $package->price_per_message =  0.45;
        $package->free_sms = 0;
        $package->is_active =  1;
        $package->save();

        //4
        $package = new Package();
        $package->name = 'Package - 4';
        $package->price =  2000;
        $package->branch = 16;
        $package->admin = 3;
        $package->manager = 18;
        $package->duration = 30;
        $package->price_per_message =  0.45;
        $package->free_sms = 0;
        $package->is_active =  1;
        $package->save();

        //5
        $package = new Package();
        $package->name = 'Package - 5';
        $package->price =  2400;
        $package->branch = 20;
        $package->admin = 4;
        $package->manager = 23;
        $package->duration = 30;
        $package->price_per_message =  0.45;
        $package->free_sms = 0;
        $package->is_active =  1;
        $package->save();

        //6
        $package = new Package();
        $package->name = 'Package - 6';
        $package->price =  2800;
        $package->branch = 26;
        $package->admin = 5;
        $package->manager = 30;
        $package->duration = 30;
        $package->price_per_message =  0.45;
        $package->free_sms = 0;
        $package->is_active =  1;
        $package->save();

        //7
        $package = new Package();
        $package->name = 'Package - 7';
        $package->price =  3000;
        $package->branch = 34;
        $package->admin = 5;
        $package->manager = 38;
        $package->duration = 30;
        $package->price_per_message =  0.45;
        $package->free_sms = 0;
        $package->is_active =  1;
        $package->save();

        //8
        $package = new Package();
        $package->name = 'Package - 8';
        $package->price =  3500;
        $package->branch = 45;
        $package->admin = 8;
        $package->manager = 50;
        $package->duration = 30;
        $package->price_per_message =  0.45;
        $package->free_sms = 0;
        $package->is_active =  1;
        $package->save();

    }
}
