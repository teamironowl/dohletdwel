<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteerFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('volunteer_name');
            $table->integer('volunteer_age');
            $table->string('volunteer_gender');
            $table->string('volunteer_phone')->nullable();
            $table->string('volunteer_address')->nullable();
            $table->string('prefer_location')->nullable();
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
        Schema::dropIfExists('volunteer_forms');
    }
}
