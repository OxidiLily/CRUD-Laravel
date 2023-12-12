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
        Schema::create('students', function (Blueprint $table) {
            // $table->id();
            $table->char('idstudents',7);
            $table->string('nama',100);
            $table->enum('kelamin',['M','F']);
            $table->string('alamat',100);
            $table->string('email',100);
            $table->char('phone',20);
            $table->primary('idstudents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
