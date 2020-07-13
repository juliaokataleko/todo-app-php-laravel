<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_steps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('todo_id');
            $table->timestamps();
            $table->foreign('todo_id')->references('id')->on('todos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_steps');
    }
}
