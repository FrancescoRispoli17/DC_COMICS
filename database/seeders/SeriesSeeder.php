<?php

namespace Database\Seeders;

use App\Models\Serie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=config('tv');
        
        foreach($data as $serie_db){
            $serie=new Serie();

            $serie->title=$serie_db['title'];
            $serie->description=$serie_db['description'];
            $serie->thumb=$serie_db['thumb'];
            $serie->date=$serie_db['date'];
            $serie->finished=$serie_db['finished'];
            $serie->stagioni=$serie_db['stagioni'];

            $serie->save();
        }
    }
}
