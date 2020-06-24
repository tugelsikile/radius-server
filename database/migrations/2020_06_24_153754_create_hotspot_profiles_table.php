<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotspotProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rad_profiles', function (Blueprint $table) {
            $table->string('id',100)->primary()->unique();
            $table->string('user_id',100);
            $table->string('owner_id',100)->nullable();
            $table->string('bw_id',100);
            $table->string('group_id',100)->nullable();
            $table->enum('rad_tipe',['ppp','hotspot'])->default('hotspot');
            $table->integer('price',false,true);
            $table->integer('sell',false,true);
            $table->integer('vat',false,true);
            $table->boolean('op_access')->default(1);
            $table->enum('tipe',['limited','unlimited'])->default('unlimited');
            $table->enum('tipe_limit',['time','data'])->default('time');
            $table->integer('limit_number',false,true)->nullable();
            $table->enum('limit_unit',['s','h','d','m','mb','gb'])->nullable();
            $table->string('burst')->nullable();
            $table->integer('valid_time',false,true)->default(0);
            $table->enum('valid_unit',['s','h','d','m'])->default('s');
            $table->integer('shared_num',false,true)->default(0);
            $table->tinyInteger('priority',false,true)->default(8);
            $table->longText('created_by')->nullable();
            $table->longText('updated_by')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('owner_id')->on('users')->references('id')->onDelete('set null')->onUpdate('no action');
            $table->foreign('bw_id')->on('rad_bw_profiles')->references('id')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('group_id')->on('rad_prof_groups')->references('id')->onDelete('set null')->onUpdate('no action');
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
        Schema::dropIfExists('rad_hs_profiles');
    }
}
