<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('editor');
            $table->string('story');
            $table->integer('points');
            $table->integer('actual_point');
            $table->integer('remaining_point');
            $table->enum('status',['progress', 'done_dev', 'to_test', 'to_review', 'done', 'incomplete', 'rejected', 'cancelled']);
            $table->date('test_date');
            $table->string('note');
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
        Schema::dropIfExists('stories');
    }
}
