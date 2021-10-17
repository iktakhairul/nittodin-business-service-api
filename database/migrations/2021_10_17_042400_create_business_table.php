<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('business_category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('type');
            $table->string('business_logo');
            $table->string('business_code');
            $table->string('contact_no');
            $table->string('email');
            $table->string('website');
            $table->integer('division_id');
            $table->integer('district_id');
            $table->integer('thana_id');
            $table->string('address');
            $table->double('ranking_score',5,2);
            $table->string('status')->default(0);
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
        Schema::dropIfExists('business');
    }
}
