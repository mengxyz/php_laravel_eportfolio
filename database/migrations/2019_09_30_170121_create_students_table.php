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
            $table->increments('std_id');
            $table->string('std_name', 100)->nullable()->default('');
            $table->string('std_address', 100)->nullable()->default('');
            $table->string('std_tel', 100)->nullable()->default('');
            $table->string('std_pic', 100)->nullable()->default('');
            $table->string('pa_id', 100)->nullable()->default('');
            $table->tinyInteger('c_id')->nullable()->default(null);
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
