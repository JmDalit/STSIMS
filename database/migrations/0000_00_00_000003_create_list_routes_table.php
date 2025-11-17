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
        Schema::create('list_routes', function (Blueprint $table) {
            $table->id();
            $table->string('label')->nullable();
            $table->json('roles')->nullable();
            $table->unsignedBigInteger('main_id')->nullable();
            $table->string('route')->nullable();
            $table->string('component')->nullable();
            $table->string('slug')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order_no')->default(0);
            $table->boolean('is_submenu')->default(false);
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
        Schema::dropIfExists('list_routes');
    }
};
