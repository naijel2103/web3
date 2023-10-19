<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmsPersonnesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('film_personne')->insert([
                [
                    'id' => 1,
                    'id_personne' =>1,
                    'id_film' =>1,
                ],
                [
                    'id' => 2,
                    'id_personne' =>1,
                    'id_film' =>1,
                ],
                [
                    'id' => 3,
                    'id_personne' =>1,
                    'id_film' =>1,
                ],
                [
                    'id' => 4,
                    'id_personne' =>1,
                    'id_film' =>1,
                ],
                [
                    'id' => 5,
                    'id_personne' =>1,
                    'id_film' =>1,
                ],
                [
                    'id' => 6,
                    'id_personne' =>1,
                    'id_film' =>1,
                ],
                [
                    'id' => 7,
                    'id_personne' =>1,
                    'id_film' =>1,
                ],
                [
                    'id' => 8,
                    'id_personne' =>1,
                    'id_film' =>1,
                ],
                [
                    'id' => 9,
                    'id_personne' =>1,
                    'id_film' =>1,
                ],
                [
                    'id' => 10,
                    'id_personne' =>1,
                    'id_film' =>1,
                ],
            ]);
            
    }
}
