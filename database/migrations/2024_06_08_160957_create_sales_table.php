<?php

use App\Enums\SaleStatusEnum;
use App\Enums\SaleTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('date');
            $table->boolean('type')->default(SaleTypeEnum::INSTALLMENT->value);
            $table->double('price')->default(0);
            $table->foreignId('car_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('salesman_id')->constrained('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->double('salesman_profit_percentage')->default(0);
            $table->double('salesman_profit')->default(0);
            $table->foreignId('salesman_assistant_id')->constrained('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->double('salesman_assistant_profit_percentage')->default(0);
            $table->double('salesman_assistant_profit')->default(0);
            $table->boolean('status')->default(SaleStatusEnum::ACTIVE->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
