<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandwidthProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rad_bw_profiles', function (Blueprint $table) {
            $table->string('id',100)->primary()->unique();
            $table->string('user_id',100);
            $table->string('owner_id',100)->nullable();
            $table->string('name');
            $table->integer('upload_min',false,true)->default(0);
            $table->integer('upload_max',false,true)->default(0);
            $table->enum('upload_min_unit',['Kbps','Mbps'])->default('Kbps');
            $table->enum('upload_max_unit',['Kbps','Mbps'])->default('Kbps');
            $table->integer('download_min',false,true)->default(0);
            $table->integer('download_max',false,true)->default(0);
            $table->enum('download_min_unit',['Kbps','Mbps'])->default('Kbps');
            $table->enum('download_max_unit',['Kbps','Mbps'])->default('Kbps');
            $table->longText('created_by')->nullable();
            $table->longText('updated_by')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('owner_id')->on('users')->references('id')->onDelete('set null')->onUpdate('no action');
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
        Schema::dropIfExists('rad_bw_profiles');
    }
}
