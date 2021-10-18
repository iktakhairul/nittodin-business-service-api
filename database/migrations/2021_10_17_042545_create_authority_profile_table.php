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
            $table->integer('business_authority_id')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->integer('permanent_division_id')->nullable();
            $table->integer('permanent_district_id')->nullable();
            $table->integer('permanent_thana_id')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('photo')->nullable();
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
