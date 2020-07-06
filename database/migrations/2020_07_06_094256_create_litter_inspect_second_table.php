<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLitterInspectSecondTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('litter_inspect_second', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('owner_id')->comment('Breeder Id');
            $table->unsignedInteger('sire');
            $table->unsignedInteger('dam');
            $table->string('dam_condition');
            $table->string('dam_eyes');
            $table->string('dam_weight');
            $table->string('dam_coat');
            $table->string('dam_nails');
            $table->string('dam_teats');

            $table->string('puppies_condition');
            $table->string('puppies_eyes');
            $table->string('puppies_weight');
            $table->string('puppies_coat');
            $table->string('puppies_bones');
            $table->string('puppies_nails');
            $table->string('puppies_skincondition');
            $table->string('puppies_bites');
            $table->string('puppies_testicles');
            $table->string('puppies_temperaments');
            $table->string('puppies_uniformity_of_size');
            
            $table->string('special_recommendation');
            $table->string('special_features');

            $table->unsignedInteger('created_by');

            $table->timestamps();
            $table->foreign('sire')->references('id')->on('dogs');
            $table->foreign('dam')->references('id')->on('dogs');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('litter_inspect_second');
    }
}
