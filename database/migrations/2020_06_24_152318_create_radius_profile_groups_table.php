<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadiusProfileGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rad_prof_groups', function (Blueprint $table) {
            $table->string('id',100)->primary()->unique();
            $table->string('user_id',100);
            $table->string('owner_id',100)->nullable();
            $table->string('router_id',100);
            $table->string('name');
            $table->enum('tipe',['hotspot','ppp'])->default('hotspot');
            $table->enum('ip_pool',['group only','mikrotik','sql'])->default('group only');
            $table->string('hotspot_ip')->nullable();
            $table->string('range_start')->nullable();
            $table->string('range_end')->nullable();
            $table->string('dns');
            $table->longText('created_by')->nullable();
            $table->longText('updated_by')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('owner_id')->on('users')->references('id')->onDelete('set null')->onUpdate('no action');
            $table->foreign('router_id')->on('routers')->references('id')->onDelete('cascade')->onUpdate('no action');
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
        Schema::dropIfExists('rad_prof_groups');
    }
}
