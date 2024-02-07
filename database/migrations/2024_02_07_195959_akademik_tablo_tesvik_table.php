<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akademik_tablo_tesvik', function (Blueprint $table) {
            $table->id();
        $table->string('temel_alan');
        $table->string('bilimsel_alan');
        $table->string('akademik_faaliyet_turu');
        $table->string('faaliyet');
        $table->string('eser_adi');
        $table->string('doi_numarasi')->nullable(); 
        $table->string('kisi');
        $table->string('basvuru_donemi');
        $table->decimal('tesvik_puani', 8, 2); 
        $table->date('basvuru_tarihi');
        $table->text('dosyalar')->nullable(); 
        $table->string('onay_durumu')->default('beklemede'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akademik_tablo_tesvik');
    }
};
