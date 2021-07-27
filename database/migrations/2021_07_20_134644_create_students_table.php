<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedBigInteger('student_type_id');
            $table->unsignedBigInteger('nationality_id');
            $table->unsignedBigInteger('document_type_id');
            $table->string('document_number');
            $table->string('file_number')->unique();
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->timestamps();

            $table->foreign('student_type_id')->references('id')->on('student_types');
            $table->foreign('nationality_id')->references('id')->on('nationalitys');
            $table->foreign('document_type_id')->references('id')->on('document_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
