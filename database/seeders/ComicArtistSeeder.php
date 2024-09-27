<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Comic;
use App\Models\ComicArtist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = config('comics');  // Dati dal file di configurazione

        foreach ($data as $index => $comic_db) {
            $comic = Comic::find($index+1);  // Trova il fumetto

            if ($comic) {
                foreach ($comic_db['artists'] as $artist_name) {
                    // Trova l'artista per nome
                    $artist = Artist::where('name', $artist_name)->first();

                    if ($artist) {
                        // Aggiungi l'artista al fumetto senza creare duplicati
                        $comic->artists()->syncWithoutDetaching([$artist->id]);
                    }
                }
            }
        }
    }
}
