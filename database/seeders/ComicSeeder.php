<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comic;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config('comics');

        Comic::truncate();

        foreach ($comics as $comicElement) {
            $comic = new Comic();
            $comic->title = $comicElement['title'];
            $comic->description = $comicElement['description'];
            $comic->thumb = $comicElement['thumb'];
            $comic->price = $comicElement['price'];
            $comic->sale_date = $comicElement['sale_date'];
            $comic->series = $comicElement['series'];
            $comic->type = $comicElement['type'];
            $comic->artists = implode(', ', $comicElement['artists']);
            $comic->writers = implode(', ', $comicElement['writers']);        
            $comic->save();
        }
    }
}
