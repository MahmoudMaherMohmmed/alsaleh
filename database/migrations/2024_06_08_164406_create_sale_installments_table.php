<?php

use App\Enums\SaleInstallmentStatusEnum;
use App\Enums\SaleInstallmentTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sale_installments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('title');
            $table->double('value')->default(0);
            $table->date('due_date');
            $table->tinyInteger('type')->default(SaleInstallmentTypeEnum::INSTALLMENT->value);
            $table->boolean('status')->default(SaleInstallmentStatusEnum::UNPAID->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_installments');
    }
};
