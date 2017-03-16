<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
			$table->tinyInteger('gen_exp')->nullable();
			$table->tinyInteger('sch_exp')->nullable();
			$table->tinyInteger('teach_time')->nullable();
			$table->smallInteger('teach_hours')->nullable();
			$table->integer('hour_rate')->nullable();
			$table->text('intro')->nullable();
			$table->tinyInteger('gender');
			$table->string('school');
			$table->integer('user_id')->unique();
			$table->date('dbirth');
			$table->smallInteger('age');
			$table->smallInteger('statue');
			$table->string('specialty');
			$table->text('hear');
			$table->string('lang')->default('arabic');
			$table->smallInteger('level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
