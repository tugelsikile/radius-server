<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('id',100)->primary()->unique();
            $table->string('user_id',100);
            $table->string('owner_id',100)->nullable();
            $table->string('router_id',100)->nullable();
            $table->string('profile_id',100)->nullable();
            $table->enum('tipe',['hotspot','ppp'])->default('hotspot');
            $table->enum('paid_tipe',['pre','post'])->default('pre');
            $table->enum('paid_status',['paid','unpaid'])->default('unpaid');
            $table->enum('active_status',['enabled','disabled'])->default('enabled');
            $table->boolean('login_bind')->default(1);
            $table->enum('service_tipe',['ppoe','pptp','sstp'])->nullable();
            $table->integer('discount',false,true)->default(0);
            $table->integer('fee',false,true)->default(0);
            $table->date('due_date')->nullable();
            $table->enum('ip_tipe',['static','dynamic'])->nullable();
            $table->string('ip')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('owner_id')->on('users')->references('id')->onDelete('set null')->onUpdate('no action');
            $table->foreign('router_id')->on('routers')->references('id')->onDelete('set null')->onUpdate('no action');
            $table->foreign('profile_id')->on('rad_profiles')->references('id')->onDelete('cascade')->onUpdate('no action');
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
        Schema::dropIfExists('customers');
    }
}
