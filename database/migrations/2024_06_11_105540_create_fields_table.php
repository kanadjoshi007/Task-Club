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

        Schema::create('clubs', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary()->comment = "Unique identifier for each club.";
            $table->unsignedInteger('group_id')->comment = "Identifier linking to a specific group.";
            $table->string('business_name',150)->comment = "Name of the club's business entity.";
            $table->string('club_number',30)->comment = "Club identification number";
            $table->string('club_name',200)->comment = "Name of the club.";
            $table->string('club_state',50)->comment = "State where the club is located.";
            $table->text('club_description')->comment = "HTML content describing the club.";
            $table->string('club_slug',200)->comment = "Slug for the club's URL.";
            $table->string('website_title',255)->comment = "Title of the club's website.";
            $table->string('website_link',100)->comment = "Link ti the club's website.";
            $table->string('club_logo',65)->comment = "File name for the club's logo.";
            $table->string('club_banner',65)->comment = "File name for the club's banner.";
        
        });
        
    }

   
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
