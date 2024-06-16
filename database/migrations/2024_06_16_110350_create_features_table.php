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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->float('area');
            $table->integer('bedrooms');
            $table->integer('kitchens');
            $table->string('parking');
            $table->string('type');
            $table->unsignedBigInteger('property_id')->nullable();
            $table->timestamps();

            // $table->foreign('property_id')->references('id')->on('properties')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
};
