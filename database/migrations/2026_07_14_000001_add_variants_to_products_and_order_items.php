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
        // Add sizes & colors JSON columns to products
        Schema::table('products', function (Blueprint $table) {
            $table->json('sizes')->nullable()->after('stock');
            $table->json('colors')->nullable()->after('sizes');
        });

        // Add selected variant columns to order_items
        Schema::table('order_items', function (Blueprint $table) {
            $table->string('selected_size', 10)->nullable()->after('quantity');
            $table->string('selected_color', 50)->nullable()->after('selected_size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['sizes', 'colors']);
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn(['selected_size', 'selected_color']);
        });
    }
};
