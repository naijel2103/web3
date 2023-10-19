<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        DB::table('films')->insert([
            [
                'id' => 1,
                'titre'=>"test",
                'resume' =>"test",
                'palette'=>"test",
                'duree' =>"2",
                'titre'=>"test",
                'annee' =>"2023",
                'rating'=>"4",
                'video' =>"test",

            ],
            [
                'id' => 2,
                'titre'=>"test",
                'resume' =>"test",
                'palette'=>"test",
                'duree' =>"2",
                'titre'=>"test",
                'annee' =>"2023",
                'rating'=>"4",
                'video' =>"test",
            ],
            [
                'id' => 3,
               'titre'=>"test",
               'resume' =>"test",
               'palette'=>"test",
               'duree' =>"2",
               'titre'=>"test",
               'annee' =>"2023",
               'rating'=>"4",
               'video' =>"test",
       
            ],
            [
                'id' => 4,
                'titre'=>"test",
                'resume' =>"test",
                'palette'=>"test",
                'duree' =>"2",
                'titre'=>"test",
                'annee' =>"2023",
                'rating'=>"4",
                'video' =>"test",
           
            ],
            [
                'id' => 5,
                'titre'=>"test",
                'resume' =>"test",
                'palette'=>"test",
                'duree' =>"2",
                'titre'=>"test",
                'annee' =>"2023",
                'rating'=>"4",
                'video' =>"test",
               
            ],
            [
                'id' => 6,
                'titre'=>"test",
                'resume' =>"test",
                'palette'=>"test",
                'duree' =>"2",
                'titre'=>"test",
                'annee' =>"2023",
                'rating'=>"4",
                'video' =>"test",
                   
            ],
            [
                'id' => 7,
                'titre'=>"test",
                'resume' =>"test",
                'palette'=>"test",
                'duree' =>"2",
                'titre'=>"test",
                'annee' =>"2023",
                'rating'=>"4",
                'video' =>"test",
                       
            ],
            [
                'id' => 8,
                'titre'=>"test",
                'resume' =>"test",
                'palette'=>"test",
                'duree' =>"2",
                'titre'=>"test",
                'annee' =>"2023",
                'rating'=>"4",
                'video' =>"test",
                           
            ],
            [
                'id' => 9,
                'titre'=>"test",
                'resume' =>"test",
                'palette'=>"test",
                'duree' =>"2",
                'titre'=>"test",
                'annee' =>"2023",
                'rating'=>"4",
                'video' =>"test",
                               
            ],
            [
                'id' => 10,
                'titre'=>"test",
                'resume' =>"test",
                'palette'=>"test",
                'duree' =>"2",
                'titre'=>"test",
                'annee' =>"2023",
                'rating'=>"4",
                'video' =>"test",
                                   
            ],
        ]);
        }
}
