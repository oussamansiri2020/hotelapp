<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->integer('cost');
            $table->integer('duration');
            $table->string('image');
            $table->integer('discount_percentage')->default(0);
            $table->text('description')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('spas');
    }
}
