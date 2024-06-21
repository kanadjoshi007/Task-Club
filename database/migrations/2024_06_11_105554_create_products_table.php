<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary()->comment='Unique identifier for each product';
            $table->unsignedInteger('club_id')->nullable(false)->comment='Identifier indecating the associated club';
            $table->string('title',255)->nullable(false)->comment='Title of the product';
            $table->string('product_title',255)->nullable()->comment='Product title';
            $table->string('type',100)->nullable(false)->comment='Type of the product';
            $table->timestamps();
        }); 


        Schema::table('products', function ($table) {
           
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');

        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
