<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id(); // otomatis primary key auto increment
            $table->string('name', 100);
            $table->string('address', 200);
            $table->string('phone', 20);
            $table->string('email', 100)->unique();
            $table->text('description')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
