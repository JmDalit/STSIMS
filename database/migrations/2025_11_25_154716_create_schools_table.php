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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('shortcut');
            $table->string('photo')->nullable();
            $table->foreignId('reference_id')->nullable()->constrained('list_references')->onDelete('set null');
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
        Schema::dropIfExists('schools');
    }
};
