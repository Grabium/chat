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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_user_id')->constrained('users', 'id');//a coluna creator_user_id referencia a tabela users na coluna id automaticamente
            $table->foreignId('participant_user_id')->constrained('users', 'id');//a coluna participant_user_id referencia a tabela users na coluna id automaticamente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
