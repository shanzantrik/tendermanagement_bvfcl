<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tenders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id', false, true);
            $table->string('name', 127);
            $table->date('upload_date');
            $table->date('monthyear');
            $table->string('tender', 255);
            $table->enum('added_by', ['admin', 'user'])->default('user');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_tenders');
    }
}
