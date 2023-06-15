<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('user')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image');
            $table->string('address');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')-> references('id')->on('rols');
        });

      
    }

    /** nombre, apellido, telefono, email, img, direccion
$table->unsignedBigInteger('id_rol');
    $table->foreign('id_rol')->references('id')->on('rol');
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
