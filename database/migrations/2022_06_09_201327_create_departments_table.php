<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('open');
            $table->boolean('show_on_new_applications');
            $table->boolean('member_only_apply');
            $table->timestamps();
        });

        DB::table('departments')->insert(['name' => 'Blane County Sheriff\'s Office', 'open' => 1, 'show_on_new_applications' => 1, 'member_only_apply' => 0]);
        DB::table('departments')->insert(['name' => 'Los Santos Police Department', 'open' => 1, 'show_on_new_applications' => 1, 'member_only_apply' => 0]);
        DB::table('departments')->insert(['name' => 'San Andreas Highway Patrol', 'open' => 1, 'show_on_new_applications' => 1, 'member_only_apply' => 0]);
        DB::table('departments')->insert(['name' => 'Civilian Department', 'open' => 1, 'show_on_new_applications' => 1, 'member_only_apply' => 0]);
        DB::table('departments')->insert(['name' => 'San Andreas Communications Department', 'open' => 1, 'show_on_new_applications' => 1, 'member_only_apply' => 0]);
        DB::table('departments')->insert(['name' => 'San Andreas Fire Rescue', 'open' => 1, 'show_on_new_applications' => 1, 'member_only_apply' => 0]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
