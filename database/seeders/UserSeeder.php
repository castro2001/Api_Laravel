<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            [
                'name'=>'Jordan Alexander',
                'lastname'=>'Castro Lino',
                'user'=>'Alexander28',
                'email'=>'jordanlino83@gmail.com',
                'password'=> Hash::make('2001'),
                'image'=>'resources\img\perfil.jpeg',
                'address'=>'38 Portete',
                'id_rol'=>1
                
            ],
        ]);
    }
    
}   
// nombre, apellido, telefono, email, img, direccion

