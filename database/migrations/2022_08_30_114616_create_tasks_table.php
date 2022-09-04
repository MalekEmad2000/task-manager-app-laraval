<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->date('date')->nullable();
            $table->unsignedbiginteger('user-id')->nullable();
            $table->foreign('user-id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedbiginteger('familly_id')->nullable();
            $table->foreign('familly_id')->references('id')->on('famillies')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tasks');
    }
}
