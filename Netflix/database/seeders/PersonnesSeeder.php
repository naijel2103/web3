<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonnesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personnes')->insert([
                [
                    'id' => 1,
                    'nom'=>"test",
                    'date_naissance' =>"test",
                    'lieu_naissance'=>"test",
                    'photo' =>"test",
          
               ],
               [
                   'id' => 2,
                   'nom'=>"test",
                   'date_naissance' =>"test",
                   'lieu_naissance'=>"test",
                   'photo' =>"test",
               ],
               [
                    'id' => 3,
                    'nom'=>"test",
                    'date_naissance' =>"test",
                    'lieu_naissance'=>"test",
                    'photo' =>"test",
      
                ],
                [
                    'id' => 4,
                    'nom'=>"test",
                    'date_naissance' =>"test",
                    'lieu_naissance'=>"test",
                    'photo' =>"test",
  
                ],
                [
                    'id' => 5,
                    'nom'=>"test",
                    'date_naissance' =>"test",
                    'lieu_naissance'=>"test",
                    'photo' =>"test",

                ],
                [
                    'id' => 6,
                    'nom'=>"test",
                    'date_naissance' =>"test",
                    'lieu_naissance'=>"test",
                    'photo' =>"test",

                ],
                [
                    'id' => 7,
                    'nom'=>"test",
                    'date_naissance' =>"test",
                    'lieu_naissance'=>"test",
                    'photo' =>"test",

                ],
                [
                    'id' => 8,
                    'nom'=>"test",
                    'date_naissance' =>"test",
                    'lieu_naissance'=>"test",
                    'photo' =>"test",

                ],
                [
                    'id' => 9,
                    'nom'=>"test",
                    'date_naissance' =>"test",
                    'lieu_naissance'=>"test",
                    'photo' =>"test",

                ],
                [
                    'id' => 10,
                    'nom'=>"test",
                    'date_naissance' =>"test",
                    'lieu_naissance'=>"test",
                    'photo' =>"test",

],
           ]);
    }
}
