<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('user_profile_id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->enum('sex', ['MALE', 'FEMALE']);
            $table->date('birthday');
            $table->string('citizenship');
            $table->enum('civil_status', ['SINGLE', 'MARRIED', 'WIDOWED', 'DIVORCED']);
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->bigInteger('bloodtype_id')->unsigned()->index();
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
        Schema::dropIfExists('user_profiles');
    }
}
