<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('company_name',100)->unique();
            $table->string('company_email_id',80)->nullable();
            $table->string('company_contact_no',15)->nullable();
            $table->string('country_code',5)->nullable();
            $table->text('company_address')->nullable();
            $table->string('landmark',100)->nullable();
            $table->string('state',45)->nullable();
            $table->string('city',45)->nullable();
            $table->string('country',45)->nullable();
            $table->string('pincode',10)->nullable();
            $table->string('pan_number',11)->nullable();
            $table->string('gst_number',45)->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
