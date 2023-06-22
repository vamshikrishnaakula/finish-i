<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts');
            $table->string('event_name',256);
            $table->string('event_slug',256);
            $table->text('description');
            $table->string('event_category',45)->nullable();
            $table->string('event_type',45)->nullable();
            $table->datetime('event_start_date')->nullable();
            $table->datetime('event_end_date')->nullable();
            $table->datetime('ticket_category_change')->nullable();
            $table->datetime('registration_start')->nullable();
            $table->datetime('registration_close')->nullable();
            $table->boolean('is_gst_on_race_applicable',2)->default(false);
            $table->string('gst_race_amount',45)->nullable();
            $table->string('processing_fee',45)->nullable();
            $table->string('gst_on_processing_fee',45)->nullable();
            $table->text('display_text_bef_reg')->nullable();
            $table->text('display_text_after_reg')->nullable();
            $table->boolean('is_full_coupon_reg',2)->default(false);
            $table->boolean('allow_international_payment',2)->default(false);
            $table->boolean('has_results',2)->default(false);
            $table->datetime('results_submission_start')->nullable();
            $table->datetime('results_submission_end')->nullable();
            $table->datetime('creation_date')->nullable();
            $table->string('creation_ip',45)->nullable();
            $table->string('created_by',45)->nullable();
            $table->datetime('updated_date')->nullable();
            $table->string('updated_ip',45)->nullable();
            $table->string('updated_by',45)->nullable();
            $table->enum('status',['A','I','B','D'])->nullable()->default('A');
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
        Schema::dropIfExists('events');
    }
}
