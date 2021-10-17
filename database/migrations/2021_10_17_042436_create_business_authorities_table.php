<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessAuthoritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_authorities', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('business_id');
            $table->string('name');
            $table->string('contact_numbers');
            $table->string('emails');
            $table->double('ownership_percentage', 5, 2);
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
        Schema::dropIfExists('business_authorities');
    }
}
