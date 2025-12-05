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
        Schema::create('location_provinces', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('name', 150)->unique();
            $table->string('old_name')->nullable();
            $table->string('region_code');
            $table->foreign('region_code')->references('code')->on('location_regions')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_delete')->default(false);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_provinces');
    }
};
