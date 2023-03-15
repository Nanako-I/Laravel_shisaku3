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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('person_name');//追記
            $table->date('date_of_birth');
            $table->integer('age');
            // integerからstringに手打ちで修正↓
            $table->string('gender')->nullable();
            $table->string('profile_image')->nullable();
			$table->text('disability_name')->nullable();//追記
//             $table->timestamps();

//  genderカラムのデータ型変更↓
        DB::statement('ALTER TABLE people_table MODIFY gender VARCHAR(100);');
        
        });
    }


// public function up()
// {
//     DB::statement('ALTER TABLE people_table MODIFY gender string;');
// }

//  genderカラムのデータ型変更時に打ったコード↓
public function down()
{
    DB::statement('ALTER TABLE people_table MODIFY gender integer;');
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
//     public function down()
//     {
//         Schema::dropIfExists('people');
//     }
};
