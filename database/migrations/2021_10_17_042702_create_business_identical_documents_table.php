<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessIdenticalDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_identical_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('business_id');
            $table->string('trade_license_no');
            $table->string('trade_license_image');
            $table->string('tin');
            $table->string('tin_image');
            $table->string('bin');
            $table->string('bin_image');
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
        Schema::dropIfExists('business_identical_documents');
    }
}
