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
        Schema::create('tourism_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('graduate_id')->constrained('graduates')->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('region')->nullable();
            $table->json('images')->nullable();
            $table->json('contact_info')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourism_services');
    }
};
