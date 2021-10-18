<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorityProfileDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_profile_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('authority_profile_id')->nullable();
            $table->string('nid')->nullable();
            $table->string('nid_front_image')->nullable();
            $table->string('nid_back_image')->nullable();
            $table->string('tin')->nullable();
            $table->string('tin_image')->nullable();
            $table->string('passport_no')->nullable();
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
        Schema::dropIfExists('authority_profile_documents');
    }
}
