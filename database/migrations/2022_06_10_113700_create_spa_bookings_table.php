<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpaBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spa_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spa_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->datetime('arrival_date');
            $table->integer('cost');
            $table->boolean('status')->default(true);
            $table->boolean('payment')->default(false);
            $table->timestamps();

            $table->foreign('spa_id')
                ->references('id')->on('spas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spa_bookings');
    }
}
