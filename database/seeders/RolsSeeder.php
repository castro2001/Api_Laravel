<?php

namespace Database\Seeders;

use App\Models\Rols;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Rols::insert([
            [
                "nombre"=>"Administrador"
            ],
            [
                "nombre"=>"Cliente"
            ],
            [
                "nombre"=>"Conducto"
            ]
        ]);
    }
}
