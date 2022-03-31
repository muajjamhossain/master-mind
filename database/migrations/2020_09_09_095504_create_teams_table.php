<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->string('designation',50)->nullable();
            $table->text('details')->nullable();
            $table->string('image',50)->nullable();
            $table->string('facebook',190)->nullable();
            $table->string('twitter',190)->nullable();
            $table->string('linkedin',190)->nullable();
            $table->string('pinterest',190)->nullable();
            $table->string('google',190)->nullable();
            $table->string('youtube',190)->nullable();
            $table->string('slug',40)->nullable();
            $table->integer('publish')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('teams');
    }
}
