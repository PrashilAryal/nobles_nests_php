<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->decimal('total_price', 10, 2);
            $table->decimal('booking_price', 10, 2);
            $table->string('city');
            $table->string('state');
            $table->string('district');
            // Start: Features
            $table->float('area');
            $table->integer('bedrooms');
            $table->integer('kitchens');
            $table->integer('bathrooms');
            $table->string('parking');
            $table->string('type');
            $table->text('description');
            $table->text('video_link');
            $table->text('map_link');
            // End: Features
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('is_sold')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
