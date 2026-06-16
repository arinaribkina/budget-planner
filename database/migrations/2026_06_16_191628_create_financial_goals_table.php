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
        Schema::create('financial_goals', function (Blueprint $table) {
            // Mērķa unikālais ID
$table->id();

// Lietotāja ID
$table->foreignId('user_id')->constrained()->onDelete('cascade');

// Mērķa nosaukums
$table->string('name');

// Nepieciešamā summa
$table->decimal('target_amount', 10, 2);

// Jau uzkrātā summa
$table->decimal('current_amount', 10, 2)->default(0);

// Termiņš
$table->date('deadline')->nullable();

// Izveides un rediģēšanas datums
$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_goals');
    }
};
