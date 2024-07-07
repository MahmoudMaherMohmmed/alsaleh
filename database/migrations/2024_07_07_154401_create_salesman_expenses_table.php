<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salesman_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salesman_id')->constrained('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->constrained('expense_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('title');
            $table->text('description')->nullable();
            $table->double('value')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salesman_expenses');
    }
};
