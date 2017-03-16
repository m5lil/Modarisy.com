<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('total_hours');
            $table->tinyInteger('preferred_time');
            $table->string('subject');
            $table->string('target');
            $table->text('comment');
            $table->integer('statue')->default(0);
            $table->integer('num_bid')->default(0);
            $table->integer('applicant_id')->nullable();
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
        Schema::dropIfExists('lectures');
    }
}
