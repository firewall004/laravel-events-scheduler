<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTables extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedules', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('event_id');
			$table->date('scheduled_date');
			$table->timestamps();

			// FIXME:
			// $table->foreign('event_id')->references('id')->on('events');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('schedule_tables');
	}
}
