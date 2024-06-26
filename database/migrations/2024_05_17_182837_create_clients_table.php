<?php

use App\Enums\ClientReportFiltersStatusEnum;
use App\Enums\ClientStatusEnum;
use App\Enums\ClientTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('type')->default(ClientTypeEnum::SALES_MAN->value);
            $table->boolean('report_filters_status')->default(ClientReportFiltersStatusEnum::DISABLE->value);
            $table->boolean('status')->default(ClientStatusEnum::ACTIVE->value);
            $table->string('activation_code')->nullable();
            $table->string('device_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
