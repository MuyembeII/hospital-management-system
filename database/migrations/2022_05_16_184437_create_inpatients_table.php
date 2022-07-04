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
        Schema::create('inpatients', function (Blueprint $table) {
            $table->bigIncrements('id')->index('inpatient_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('prescription_id');
            $table->unsignedBigInteger('warden_id');
            $table->string('ward', 16);
            $table->string('diagnosis', 64);
            $table->unsignedMediumInteger('bp_systolic'); //Millimetres of mercury (mmHg)
            $table->unsignedMediumInteger('bp_diastolic'); //Millimetres of mercury (mmHg)
            $table->decimal('weight', 3, 2); //Kilograms
            $table->decimal('height', 3, 2)->nullable(); //Meters
            $table->decimal('temperature', 2, 1); //Celsius (˚C)
            $table->string('visit_summary', 128);
            $table->unsignedMediumInteger('duration')->nullable();;
            $table->boolean('discharged');
            $table->date('discharged_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('prescription_id')->references('id')->on('medicines')->onDelete('cascade');
            $table->foreign('warden_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inpatients');
    }
};
