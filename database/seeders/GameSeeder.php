<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            [
                'title' => 'Super Mario Bros.',
                'thumbnail_url' => 'https://cdn02.nintendo-europe.com/media/images/05_packshots/games_13/nes_1/PS_NES_SuperMarioBros.jpg',
                'url' => 'https://www.nintendo.es/Juegos/NES/Super-Mario-Bros--803853.html',
            ],
            [
                'title' => 'Los Sims',
                'thumbnail_url' => 'https://img.discogs.com/HADSib63m1PVKdfxFiuMYxN1rs8=/fit-in/300x300/filters:strip_icc():format(jpeg):mode_rgb():quality(40)/discogs-images/R-7284471-1437999526-3130.jpeg.jpg',
                'url' => 'https://www.ea.com/es-es/games/the-sims',
            ],
            [
                'title' => 'Counter Strike: Global Offensive',
                'thumbnail_url' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/730/header.jpg?t=1612812939',
                'url' => 'https://store.steampowered.com/app/730/CounterStrike_Global_Offensive/',
            ],
            [
                'title' => 'Portal 2',
                'thumbnail_url' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/620/header.jpg?t=1610490805',
                'url' => 'https://store.steampowered.com/app/620/Portal_2/',
            ]
        ]);
    }
}
