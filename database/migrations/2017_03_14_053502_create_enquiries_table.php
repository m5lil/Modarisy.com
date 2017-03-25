<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('total_hours');
            $table->tinyInteger('preferred_time');
            $table->string('material');
            $table->decimal('lng', 11, 8);
            $table->decimal('lat', 10, 8);
            $table->string('subject');
            $table->string('target');
            $table->text('comment');
            $table->integer('statue')->default(0);
            $table->integer('teacher_id')->default(0);
            $table->integer('applicant_id')->default(0);
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
        Schema::dropIfExists('enquiries');
    }
}
