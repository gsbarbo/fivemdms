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
        Schema::create('account_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('account_statuses')->insert(['name' => 'User']);
        DB::table('account_statuses')->insert(['name' => 'Full Member']);
        DB::table('account_statuses')->insert(['name' => 'Application Pending']);
        DB::table('account_statuses')->insert(['name' => 'Leave of Absence']);
        DB::table('account_statuses')->insert(['name' => 'Suspended']);
        DB::table('account_statuses')->insert(['name' => 'Permanent Ban']);
        DB::table('account_statuses')->insert(['name' => 'Retired Member']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_statuses');
    }
};
