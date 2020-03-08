<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDroppedApplicationDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropped_application_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('id')->on('bp_applications');
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id')->references('id')->on('bp_application_documents');
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
        Schema::dropIfExists('dropped_application_documents');
    }
}
