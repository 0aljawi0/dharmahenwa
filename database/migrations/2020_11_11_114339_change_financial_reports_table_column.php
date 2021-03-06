<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFinancialReportsTableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('financial_reports', function (Blueprint $table) {
            $table->json('title');
            $table->dropColumn('year');
            $table->dropColumn('month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('financial_reports', function($table) {
            $table->string('year');
            $table->string('month');
            $table->dropColumn('title');
        });
    }
}
