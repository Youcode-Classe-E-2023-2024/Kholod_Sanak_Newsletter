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
        Schema::table('emaillists', function (Blueprint $table) {
            $table->dropColumn('unsub');
            $table->enum('status', ['sub', 'unsub'])->default('sub');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('status_in_table_name', function (Blueprint $table) {
            //
        });
    }
};
