<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $value = 1;
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('birthday', 10);
            $table->string('report');
            $table->string('country', 2);
            $table->string('phone', 17);
            $table->string('email')->unique();
            $table->tinyInteger('visibility')->unsigned()->default($value);
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->string('photo')->nullable();
            $table->text('about')->nullable();
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
        Schema::dropIfExists('members');
    }
}
