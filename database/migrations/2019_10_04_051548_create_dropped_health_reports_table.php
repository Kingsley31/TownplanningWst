<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDroppedHealthReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropped_health_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('id')->on('bp_applications');
            $table->unsignedBigInteger('health_report_id');
            $table->foreign('health_report_id')->references('id')->on('health_reports');
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
        Schema::dropIfExists('dropped_health_reports');
    }
}
