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
        Schema::table('topvideos', function (Blueprint $table) {
            //新增優先度(權重)
            $table->integer('weight')->nullable()->comment('權重'); #->comment()是允許加入註解
            $table->integer('duration')->nullable()->comment('影片長度');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topvideos', function (Blueprint $table) {
            //
        });
    }
};
