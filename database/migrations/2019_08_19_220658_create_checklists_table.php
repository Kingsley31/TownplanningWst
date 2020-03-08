<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('id')->on('bp_applications');
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->string('building_plan');
            $table->string('tax_clearance');
            $table->string('site_analysis_report');
            $table->string('site_plan');
            $table->string('c_of_o');
            $table->string('power_of_attoney');
            $table->string('capitation_rate');
            $table->string('invoice_for_payment');
            $table->string('sir');
            $table->string('hor');
            $table->string('engr_report');
            $table->string('ppi_certification');
            $table->string('assessment_sheet');
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
        Schema::dropIfExists('checklists');
    }
}
