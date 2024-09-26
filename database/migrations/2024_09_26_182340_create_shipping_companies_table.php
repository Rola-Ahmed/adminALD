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
        Schema::create('shipping_companies', function (Blueprint $table) {
            $table->id();
            $table->string('shippingCotunries',500)->nullable()->default(json_encode([])); // Use JSON format array
            $table->string('shippingCities',500)->nullable()->default(json_encode([])); // Use JSON format array
            $table->string('company_name',500)->nullable(); // Use JSON format array

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shiping_companies');
    }
};
