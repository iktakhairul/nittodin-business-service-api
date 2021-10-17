<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorityProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_profile', function (Blueprint $table) {
            $table->id();
            $table->integer('business_authority_id');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('gender');
            $table->string('dob');
            $table->string('religion');
            $table->string('nationality');
            $table->integer('permanent_division_id');
            $table->integer('permanent_district_id');
            $table->integer('permanent_thana_id');
            $table->string('permanent_address');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authority_profile');
    }
}
