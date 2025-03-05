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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("coat");
            $table->date("birthdate");
            $table->unsignedBigInteger("species_id");
            $table->unsignedBigInteger("diet_id");
            $table->timestamps();

            $table->foreign('diet_id')
                ->references('id')
                ->on('diet')
                ->onDelete('cascade');

            $table->foreign('species_id')
                ->references('id')
                ->on('species')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
