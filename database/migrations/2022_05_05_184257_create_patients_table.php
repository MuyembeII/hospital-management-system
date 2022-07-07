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
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id')->index('patient_id');
            $table->string('first_name', 32);
            $table->string('last_name', 32);
            $table->string('email', 32);
            $table->string('contactnumber', 13);
            $table->string('registration_id', 15)->nullable()->unique();
            $table->string('address');
            $table->char('sex', 1);//Mapping Guide ([sex(F) F -> Female, sex(M) M -> Male, sex(U) U -> Unknown])
            $table->date('dob');
            $table->string('birth_place', 32)->nullable();
            $table->string('nationality', 24)->nullable();
            $table->string('religion', 16)->nullable();
            $table->string('language', 24)->nullable();
            $table->string('guardian', 32)->nullable();
            $table->string('guardian_contact', 32)->nullable();
            $table->mediumText('guardian_address')->nullable();
            $table->string('occupation', 32)->nullable();
            $table->string('nrc',11)->nullable()->unique();
            $table->string('image')->default('dist/img/avatar.png')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
