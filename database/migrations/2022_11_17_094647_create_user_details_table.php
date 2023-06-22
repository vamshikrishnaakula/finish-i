<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('first_name',80);
            $table->string('last_name',80)->nullable();
            $table->string('gender',7)->nullable();
            $table->string('mobile_number',15);
            $table->string('country_code',4)->nullable()->default('NULL');
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->string('landmark',45)->nullable();
            $table->string('area',100)->nullable();
            $table->string('state',45)->nullable();
            $table->string('city',45)->nullable();
            $table->string('country',45)->nullable();
            $table->string('pincode',10)->nullable();
            $table->text('profile_image')->nullable();
            $table->string('nationality',45)->nullable();
            $table->string('blood_group',3)->nullable();
            $table->string('creation_ip',45)->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->datetime('updated_date')->nullable();
            $table->string('updated_ip',45)->nullable();
            $table->foreignId('updated_by')->nullable()->constrained('users');
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
        Schema::dropIfExists('user_details');
    }
}
