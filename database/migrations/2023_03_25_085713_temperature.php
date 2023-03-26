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
        Schema::create('temperature', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('people_id');
    $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
    // 他のカラムの定義　合計3桁で小数1桁の体温を表すカラム↓
    $table->decimal('temperature', 3, 1);
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
