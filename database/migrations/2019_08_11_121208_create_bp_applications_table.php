<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBpApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bp_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('developer_user_id');
            $table->foreign('developer_user_id')->references('id')->on('users');
            $table->bigInteger('application_number');
            $table->unsignedBigInteger('super_zone');
            $table->foreign('super_zone')->references('id')->on('super_zones');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->unsignedBigInteger('village_id');
            $table->foreign('village_id')->references('id')->on('villages');
            $table->string('file_no');
            $table->string('app_stage');
            $table->string('app_stage_status');
            $table->string('app_building_height');
            $table->string('building_type');
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
        Schema::dropIfExists('bp_applications');
    }
}
