<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Gender');
            $table->string('Email');
            $table->string('Password');
            $table->string('BirthDate');
            $table->string('JoinDate');
            $table->string('MobileNumber');
            $table->string('BloodGroup');
            $table->string('Class');
            $table->string('Department');
            $table->string('Section');
            $table->string('Subject');
            $table->text('PermanentAddress');
            $table->text('PresentAddress');
            $table->text('Image');
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
        Schema::dropIfExists('teachers');
    }
}
