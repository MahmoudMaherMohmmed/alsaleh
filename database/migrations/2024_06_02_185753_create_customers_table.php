<?php

use App\Enums\CustomerStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salesman_id')->constrained('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('reference_id')->default(0);
            $table->string('name');
            $table->string('phone');
            $table->string('phone_2')->nullable();
            $table->foreignId('area_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->boolean('status')->default(CustomerStatusEnum::ACTIVE->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
