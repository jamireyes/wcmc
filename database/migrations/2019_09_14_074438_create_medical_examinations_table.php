<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_examinations', function (Blueprint $table) {
            $table->bigIncrements('medical_exam_id');
            $table->unsignedDecimal('temperature', 3, 1)->nullable();
            $table->unsignedTinyInteger('blood_pressure_1')->nullable();
            $table->unsignedTinyInteger('blood_pressure_2')->nullable();
            $table->unsignedTinyInteger('pulse_rate')->nullable();
            $table->unsignedTinyInteger('weight')->nullable();
            $table->unsignedTinyInteger('height')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_examinations');
    }
}
