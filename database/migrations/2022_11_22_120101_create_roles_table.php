<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts');
            $table->string('role_name',45);
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
        Schema::dropIfExists('roles');
    }
}
