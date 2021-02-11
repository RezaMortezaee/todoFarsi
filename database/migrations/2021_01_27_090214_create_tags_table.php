<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('tag_task', function (Blueprint $table) {
            $table->primary(['tag_id', 'task_id']);
            $table->foreignId('tag_id');
            $table->foreignId('task_id');

            $table->foreign('tag_id')
                  ->references('id')
                  ->on('tags')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('task_id')
                  ->references('id')
                  ->on('tasks')
                  ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
