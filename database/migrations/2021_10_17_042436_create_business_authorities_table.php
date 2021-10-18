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
            $table->integer('user_id')->nullable();
            $table->integer('business_id')->nullable();
            $table->string('name')->nullable();
            $table->string('contact_numbers')->nullable();
            $table->string('emails')->nullable();
            $table->double('ownership_percentage', 5, 2)->nullable();
            $table->string('status')->default(0)->nullable();
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
