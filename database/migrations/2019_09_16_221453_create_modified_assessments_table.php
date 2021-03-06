<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifiedAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modified_assessments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assessment_id');
            $table->foreign('assessment_id')->references('id')->on('assessments');
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('id')->on('bp_applications');
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->unsignedDecimal("planning_rate");
            $table->unsignedDecimal("inspection_rate");
            $table->unsignedDecimal("registration_fee");
            $table->unsignedDecimal("charting_fee");
            $table->unsignedDecimal("fencing_fee");
            $table->unsignedDecimal("stages_permit_fee");
            $table->unsignedDecimal("igr_fee");
            $table->unsignedDecimal("penalty_fee");
            $table->unsignedDecimal("total");
            $table->unsignedBigInteger('modified_by');
            $table->foreign('modified_by')->references('id')->on('staff');
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
        Schema::dropIfExists('modified_assessments');
    }
}
