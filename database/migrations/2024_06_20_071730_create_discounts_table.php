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
        Schema::create('discounts', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->string('code',10);
            $table->double('percentage');
            $table->double('min_amount');
            $table->timestamp('expiry_date');
            $table->enum('status', ['active', 'inactive']);

        });

        Schema::table('discounts', function ($table) {
           
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
