<?php

namespace Database\Seeders;

use App\Models\Locaciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Locaciones::insert([
             [
                "nombre" =>"Mall del Sol",
                "latitud"=> -2.1547432,
                "longuitud"=> -79.8965072
            ],
             [
                "nombre" =>"Mall de Sur",
                "latitud"=> -2.2293523,
                "longuitud"=> -79.9033252
            ],
             [
                "nombre" =>"San Marino shopping ",
                "latitud"=> -2.1693423,
                "longuitud"=> -79.9034106
            ],
             [
                "nombre" =>"Policentro ",
                "latitud"=> -2.1709222,
                "longuitud"=> -79.9028308
            ],
             [
                "nombre" =>"Malecon 2000",
                "latitud"=> -2.1938946,
                "longuitud"=> -79.890154
            ],
             [
                "nombre" =>"Estadio monumental banco pinchinca Barcelona",
                "latitud"=> -2.185879,
                "longuitud"=> -79.9301239
            ],
             [
                "nombre" =>"CMI ",
                "latitud"=> -2.1867667,
                "longuitud"=> -79.8910945
            ],
             [
                "nombre" =>"Bahia ",
                "latitud"=> -2.196415,
                "longuitud"=> -79.8893125
            ],
             [
                "nombre" =>"hospital del niño ",
                "latitud"=> -2.2032673,
                "longuitud"=> -79.8957807
            ],
             [
                "nombre" =>"Playa Villamil",
                "latitud"=> -2.6425579,
                "longuitud"=>  -80.3901862
            ]
        ]);
    }
}
