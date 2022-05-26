<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('steam_hex')->primary();
            $table->bigInteger('steam_id');
            $table->bigInteger('discord_id')->nullable();

            $table->unsignedBigInteger('account_status')->default(1);
            $table->boolean('reapply')->nullable();
            $table->date('reapply_date')->nullable();
            $table->string('denied_reason')->nullable();

            $table->string('avatar')->default('avatar.jpg');
            $table->string('email')->nullable();
            $table->string('real_name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('discord_name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('ts_name')->nullable();
            $table->string('officer_name')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->boolean('is_protected_user')->default(0);
            $table->boolean('is_super_user')->default(0);
            $table->json('history')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
