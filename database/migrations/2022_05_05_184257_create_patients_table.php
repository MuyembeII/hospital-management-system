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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->primary('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->mediumText('address');
            $table->string('contactnumber');
            $table->string('sex');
            $table->date('dob');
            $table->string('birth_place')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable
            $table->string('guardian')->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('occupation');
            $table->string('nrc',15)->nullable()->unique();();
            $table->string('image')->default('dist/img/avatar.png');
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
        Schema::dropIfExists('patients');
    }
};
