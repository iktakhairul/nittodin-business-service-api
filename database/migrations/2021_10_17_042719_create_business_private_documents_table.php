<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPrivateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_private_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('business_id')->nullable();
            $table->string('document_title')->nullable();
            $table->string('document_identification_no')->nullable();
            $table->string('document_images')->nullable();
            $table->string('privacy')->nullable();
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
        Schema::dropIfExists('business_private_documents');
    }
}
