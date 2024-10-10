<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) 
        {
            $table->id();
            $table->integer('user_id');
            $table->string('bio');
            $table->date('birthday_date');
            $table->date('joining_date');
            $table->integer('age');
            $table->text('address');
            $table->string('pincode');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('emergency_contact_person_name_1');
            $table->string('emergency_contact_person_phone_1');
            $table->string('emergency_contact_person_name_2');
            $table->string('emergency_contact_person_phone_2');
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
        Schema::dropIfExists('user_info');
    }
}
