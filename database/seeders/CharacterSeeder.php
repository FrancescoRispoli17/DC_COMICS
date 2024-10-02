<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=config('character');
        
        foreach($data as $character_db){
            $character=new Character();

            $character->character=$character_db['character'];
            $character->description=$character_db['description'];
            $character->thumb=$character_db['thumb'];
            $character->release_Date=$character_db['release_date'];
            $character->first_appearance=$character_db['first_appearance'];
            if(isset($character_db['members'])){
                $character->members=$character_db['members'];
            }
            $character->save();
        }
    }
}
