<?php

namespace Database\Seeders;

use App\Models\Register;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i=0;$i<10;$i++){
            $register=new Register();
            $register->name=$faker->name();
            $register->address=$faker->address();
            $register->pIva='shdnd23';
            $register->codiceFiscale='ARS551224';
            $register->note=$faker->paragraph();
            $register->save();
        }
    }
}
