<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_roles_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Administrator, Staff, Cliente
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Insertar roles base
        DB::table('roles')->insert([
            ['name' => 'Administrator', 'description' => 'Administrador del sistema'],
            ['name' => 'Staff', 'description' => 'Personal veterinario'], 
            ['name' => 'Cliente', 'description' => 'Dueño de mascota'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
};