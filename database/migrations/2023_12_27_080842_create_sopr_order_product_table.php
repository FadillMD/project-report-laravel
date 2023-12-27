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
        Schema::create('sopr_order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('no_sopr');
            $table->unsignedBigInteger('no_pd');
            $table->integer('qty_order');
            $table->date('delivery_req');
            $table->text('notes')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('no_sopr')->references('no_sopr')->on('soprs')->onDelete('cascade');
            $table->foreign('no_pd')->references('no_pd')->on('product_determinations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sopr_order_product');
    }
};
