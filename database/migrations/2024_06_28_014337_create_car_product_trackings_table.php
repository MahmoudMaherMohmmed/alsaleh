<?php

use App\Enums\CarProductTrackingTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_product_trackings', function (Blueprint $table) {
            $table->id();
            $table->morphs('trackingable');
            $table->foreignId('car_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('quantity')->default(0);
            $table->tinyInteger('type')->default(CarProductTrackingTypeEnum::NEW->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_product_trackings');
    }
};
