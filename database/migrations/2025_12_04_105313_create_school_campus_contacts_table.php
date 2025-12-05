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
        Schema::create('school_campus_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campus_id')
                ->nullable()
                ->constrained('school_campuses')
                ->nullOnDelete();
            $table->string('dean')->nullable();
            $table->string('registrar')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('webpage')->nullable();
            $table->string('verified_by')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->date('verified_at')->nullable();
            $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_campus_contacts');
    }
};
