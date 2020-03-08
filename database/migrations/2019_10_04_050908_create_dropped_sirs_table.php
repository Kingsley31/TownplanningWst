<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDroppedSirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropped_sirs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('id')->on('bp_applications');
            $table->unsignedBigInteger('sir_id');
            $table->foreign('sir_id')->references('id')->on('sir_reports');
            $table->string('remark');
            $table->string('status');
            $table->string('app_stage');
            $table->string('app_stage_status');
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
        Schema::dropIfExists('dropped_sirs');
    }
}
