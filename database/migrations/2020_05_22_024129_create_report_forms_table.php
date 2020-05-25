<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('state_division')->nullable();
            $table->string('township_id')->nullable();
            $table->string('basic_need')->nullable();
            $table->string('affect_people')->nullable();
            $table->string('phone')->nullable();
            $table->string('report_by')->nullable();
            $table->unsignedInteger('owner_id')->nullable();
            $table->unsignedInteger('status')->default(1);
            $table->string('description')->nullable();
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
        Schema::dropIfExists('report_forms');
    }
}
