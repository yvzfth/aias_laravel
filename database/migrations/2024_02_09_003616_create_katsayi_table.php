<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatsayiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katsayi', function (Blueprint $table) {
            $table->id();
            $table->decimal('value', 10, 2);
            $table->timestamps();
        });

        // Varsayılan değerlerin eklenmesi
        DB::table('katsayi')->insert([
            ['value' => 1],
            ['value' => 0.6],
            ['value' => 0.4],
            ['value' => 0.3],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('katsayi');
    }
}
