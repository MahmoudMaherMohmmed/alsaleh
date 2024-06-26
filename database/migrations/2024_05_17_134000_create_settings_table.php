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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description')->nullable();
            $table->string('whatsapp_number');
            $table->string('calling_number');
            $table->string('info_email')->nullable();
            $table->string('support_email')->nullable();
            $table->double('salesman_profit_percentage')->default(0);
            $table->double('salesman_assistant_profit_percentage')->default(0);
            $table->integer('maximum_period_salesman_can_delete_sale')->default(7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
