<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ArtistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Artist::truncate();
        $data=config('comics');
        $data1=config('character');

        foreach($data as $comic_db){

            foreach($comic_db['artists'] as $artist_db){
                if(!Artist::where('name',$artist_db)->exists()){

                    $artist=new Artist();
                    $artist->name=$artist_db;
                    $artist->description='';
                    $artist->save();
                }
            }
        }
        foreach($data1 as $character_db){

            foreach($character_db['artists'] as $artist_db){
                if(!Artist::where('name',$artist_db)->exists()){

                    $artist=new Artist();
                    $artist->name=$artist_db;
                    $artist->description='';
                    $artist->save();
                }
            }
        }


    }
}
