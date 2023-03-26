<?php

// people_idが外部キーと連携しているため下記実行してpeople_idカラムを削除↓
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
        Schema::table('temperature', function (Blueprint $table) {
        $table->dropForeign('temperature_people_id_foreign');
        $table->dropColumn('people_id');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('temperature', function (Blueprint $table) {
        $table->unsignedBigInteger('people_id')->nullable();
        $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
    
    });
    }
};
