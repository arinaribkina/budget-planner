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
        Schema::create('incomes', function (Blueprint $table) {
           // Ieraksta unikālais ID
$table->id();

// Lietotāja ID (kurš pievienoja ienākumu)
$table->foreignId('user_id')->constrained()->onDelete('cascade');

// Kategorijas ID
$table->foreignId('category_id')->constrained()->onDelete('cascade');

// Ienākuma summa
$table->decimal('amount', 10, 2);

// Apraksts
$table->string('description');

// Datums
$table->date('date');

// Izveides un rediģēšanas datums
$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
