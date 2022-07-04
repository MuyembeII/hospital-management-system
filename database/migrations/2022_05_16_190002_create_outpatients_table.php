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
        Schema::create('outpatients', function (Blueprint $table) {
            $table->bigIncrements('id')->index('outpatient_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('prescription_id');
            /**
             * Blood pressure is measured in millimetres of mercury (mmHg)
             * and is given as two figures:
             * i. systolic pressure – the pressure when your heart pushes blood out
             * ii. diastolic pressure – the pressure when your heart rests between beats
             */
            $table->unsignedMediumInteger('bp_systolic'); //Millimetres of mercury (mmHg)
            $table->unsignedMediumInteger('bp_diastolic'); //Millimetres of mercury (mmHg)
            $table->string('weight', 8); //Kilograms (kg)
            $table->string('height', 8)->nullable(); //Meters (m)
            $table->string('temperature', 8); //Celsius (˚C)
            $table->string('diagnosis', 64);
            $table->string('reason_for_visit', 128)->nullable(); //Patient complaints
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('prescription_id')->references('id')->on('medicines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outpatients');
    }
};
