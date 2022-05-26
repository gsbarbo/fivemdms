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
        Schema::create('application_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('application_statuses')->insert(['name' => 'New Application']);
        DB::table('application_statuses')->insert(['name' => 'Pending Interview']);
        DB::table('application_statuses')->insert(['name' => 'Pending Admin Review']);
        DB::table('application_statuses')->insert(['name' => 'Approved']);
        DB::table('application_statuses')->insert(['name' => 'Withdrawn']);
        DB::table('application_statuses')->insert(['name' => 'Denied']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_statuses');
    }
};
