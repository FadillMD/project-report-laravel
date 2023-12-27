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
        Schema::create('sopr_product_determinations', function (Blueprint $table) {
            $table->id();
            $table->string('code_number');
            $table->string('no_sopr');
            $table->string('no_pd');
            $table->integer('qty_order');
            $table->date('delivery_req');
            $table->text('notes')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('no_sopr')->references('no_sopr')->on('soprs')->onDelete('cascade');
            $table->foreign('no_pd')->references('no_pd')->on('product_determinations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sopr_product_determinations');
    }
};
