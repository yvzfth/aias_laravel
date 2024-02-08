<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('submission_period');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('title');
            $table->string('faculty');
            $table->string('department');
            $table->string('work_name');
            $table->string('basic_field');
            $table->string('scientific_field');
            $table->integer('persons');
            $table->string('academic_activity_type');
            $table->string('activity');
            $table->string('doi_number');
            $table->string('file_path');
            $table->string('score')->default('0');
            $table->string('status')->default('pending');
            $table->string('comment')->default('No comment yet.');
            $table->string('comment_by')->default('No comment yet.');
            $table->string('comment_date')->default('No comment yet.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
