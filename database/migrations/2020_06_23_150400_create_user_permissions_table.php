<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->string('id',100)->primary()->unique();
            $table->string('level_id',100);
            $table->string('route');
            $table->boolean('R_opt')->default(0);
            $table->boolean('C_opt')->default(0);
            $table->boolean('U_opt')->default(0);
            $table->boolean('D_opt')->default(0);
            $table->foreign('level_id')->on('user_levels')->references('id')->onDelete('cascade')->onUpdate('no action');
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
        Schema::dropIfExists('user_permissions');
    }
}
