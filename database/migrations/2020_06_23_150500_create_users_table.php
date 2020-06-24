<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id',100)->primary()->unique();
            $table->string('level_id',100);
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('fullname');
            $table->string('ktp')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('notes')->nullable();
            $table->enum('topup',['enabled','disabled'])->default('enabled');
            $table->enum('status_balance',['active','pending'])->default('pending');
            $table->integer('cur_balance',false,true)->default(0);
            $table->enum('status_active',['active','inactive'])->default('active');
            $table->integer('max_router',false,true)->default(0);
            $table->integer('max_customer',false,true)->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('level_id')->on('user_levels')->references('id')->onDelete('cascade')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
