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
            $table->integer('business_id')->nullable();
            $table->string('trade_license_no')->nullable();
            $table->string('trade_license_image')->nullable();
            $table->string('tin')->nullable();
            $table->string('tin_image')->nullable();
            $table->string('bin')->nullable();
            $table->string('bin_image')->nullable();
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
