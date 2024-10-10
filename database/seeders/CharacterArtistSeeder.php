<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Character;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = config('character');  // Dati dal file di configurazione

        foreach ($data as $index => $comic_db) {
            $character = Character::where('character', $comic_db['character'])->first(); 

            if ($character) {
                foreach ($comic_db['artists'] as $artist_name) {
                    // Trova l'artista per nome
                    $artist = Artist::where('name', $artist_name)->first();

                    if ($artist) {
                        $character->artists()->syncWithoutDetaching([$artist->id]);
                    }
                }
            }
        }
    }
}
