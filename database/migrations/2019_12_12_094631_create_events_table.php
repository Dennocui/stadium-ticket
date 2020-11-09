<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('descrition');
            $table->string('image'); // !
            $table->dateTime('event_Date');
            $table->Time('event_duration');
            $table->double('price', 15, 2);
            $table->unsignedBigInteger('hall_id');
            $table->unique(['event_Date', 'hall_id']);
            $table->foreign('hall_id')->references('id')->on('halls')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('open')->default(0);
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
        Schema::dropIfExists('events');
    }
}
