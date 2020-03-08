<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBpApplicationDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bp_application_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bp_application_id');
            $table->foreign('bp_application_id')->references('id')->on('bp_applications');
            $table->string('doc_type');
            $table->string('src');
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
        Schema::dropIfExists('bp_application_documents');
    }
}
