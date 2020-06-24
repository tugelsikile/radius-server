<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routers', function (Blueprint $table) {
            $table->string('id',100)->primary()->unique();
            $table->string('user_id');
            $table->integer('port_api')->default(8728);
            $table->integer('port_accounting',false,true)->default(7202);
            $table->integer('port_auth',false,true)->default(7201);
            $table->string('name');
            $table->string('time_zone')->default('Asia/Jakarta');
            $table->string('address');
            $table->string('api_username');
            $table->string('api_password');
            $table->string('secret');
            $table->string('url_expired')->nullable();
            $table->text('description')->nullable();
            $table->text('created_by')->nullable();
            $table->text('updated_by')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('no action');
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
        Schema::dropIfExists('routers');
    }
}
