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
        Schema::create('portofolio', function (Blueprint $table) {
        $table->integer("id")->autoIncrement(); 
        $table->integer('society_id')->unsigned();
        $table->integer('available_position_id')->unsigned();
        $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
        $table->timestamp('applied_at')->useCurrent();
        $table->timestamps();

        // relasi ke society
        $table->foreign('society_id')->references('id')->on('society')->onDelete('cascade');

        // relasi ke available_position
        $table->foreign('available_position_id')->references('id')->on('available_position')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolio');
    }
};
