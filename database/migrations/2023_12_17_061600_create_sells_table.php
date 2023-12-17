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
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->date('sell_date');
            $table->unsignedBigInteger('product_id');
            $table->integer('sell_qty');

            $table->decimal('unit_price',10,2)->nullable();
            $table->decimal('sell_amount',10,2)->nullable();

            $table->foreign('product_id')->references('id')->on('products');
            

            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sells');
    }
};
