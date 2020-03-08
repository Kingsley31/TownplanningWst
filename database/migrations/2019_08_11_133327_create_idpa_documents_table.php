<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdpaDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idpa_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('id')->on('bp_applications');
            $table->string('signed');
            $table->string('comment');
            $table->string('src');
            $table->unsignedBigInteger('signatory_staff_id');
            $table->foreign('signatory_staff_id')->references('id')->on('staff');
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->timestamp('date_signed')->nullable();
            $table->string('signature_src');
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
        Schema::dropIfExists('idpa_documents');
    }
}
