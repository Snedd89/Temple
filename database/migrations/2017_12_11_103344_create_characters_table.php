<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->integer('gender');
            $table->integer('type')->default(1);
            $table->integer('status')->default(1);
            $table->integer('temple');
            $table->integer('location');
            $table->integer('hp')->default(100);
            $table->integer('max_hp')->default(100);
            $table->integer('xp')->default(5);
            $table->integer('speed')->default(5);
            $table->integer('strength')->default(5);
            $table->integer('defence')->default(5);
            $table->integer('stamina')->default(5);
            $table->integer('points')->default(5);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
