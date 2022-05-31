<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->string('user_steam_hex');
            $table->foreign('user_steam_hex', 'user_id_fk_6354376')->references('steam_hex')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id', 'role_id_fk_6354376')->references('id')->on('roles')->onDelete('cascade');
        });
    }
}
