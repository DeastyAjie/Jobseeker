<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('available_position', function (Blueprint $table) {
        $table->integer('company_id')->unsigned();
        $table->string('title');
        $table->text('description')->nullable();
        $table->decimal('salary', 12, 2)->nullable();
        $table->date('deadline')->nullable();
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamps();

        // relasi ke companies
        $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('available_positions');
    }
};
