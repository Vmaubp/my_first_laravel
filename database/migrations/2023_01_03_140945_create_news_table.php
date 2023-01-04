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
        // Schema::create這裡是創建資料表藍圖的地方
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // 這裡練習透過orm操作來新增"資料表"(藍圖)
            // ->nullable()意思是使欄位允許"空值"
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('img')->nullable();

            // 建完後使用php artisan migrate來"施工"真正創建出資料表
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
