<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIfinishEventRegistrationFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ifinish_event_registration_fields', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('custom_field_id');
            $table->integer('order')->length(11);
            $table->tinyInteger('field_status')->length(11);
            $table->string('help_content',250);
            $table->string('race_id',100);
            $table->foreign('custom_field_id')->references('id')->on('ifinish_custom_fields')->onCascade('delete');
            $table->foreign('event_id')->references('id')->on('events')->onCascade('delete');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ifinish_event_registration_fields');
    }
}
