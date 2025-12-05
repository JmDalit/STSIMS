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
        Schema::create('school_campus_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();

            $table->foreignId('campus_id')->constrained('school_campuses')->onDelete('set null');

            $table->string('barangay_code')->nullable();
            $table->foreign('barangay_code')->references('code')->on('location_barangays')->onDelete('set null');

            $table->string('municipality_code')->nullable();
            $table->foreign('municipality_code')->references('code')->on('location_cities')->onDelete('set null');

            $table->string('province_code')->nullable();
            $table->foreign('province_code')->references('code')->on('location_provinces')->onDelete('set null');

            $table->string('region_code')->nullable();
            $table->foreign('region_code')->references('code')->on('location_regions')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_campus_addresses');
    }
};
