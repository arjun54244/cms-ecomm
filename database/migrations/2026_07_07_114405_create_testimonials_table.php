<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('designation')->nullable();

            $table->string('company')->nullable();

            $table->string('image')->nullable();

            $table->tinyInteger('rating')->default(5);

            $table->text('review');

            $table->boolean('is_featured')->default(true);

            $table->boolean('is_active')->default(true);

            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
