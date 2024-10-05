<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=config('films');
        
        foreach($data as $film_db){
            $film=new Film();

            $film->title=$film_db['title'];
            $film->description=$film_db['description'];
            $film->thumb=$film_db['thumb'];
            $film->date=$film_db['date'];


            $film->save();
        }
    }
}
