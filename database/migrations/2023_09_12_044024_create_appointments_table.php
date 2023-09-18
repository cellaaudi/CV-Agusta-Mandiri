<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->date("appointment_date");
            // $table->time("appointment_start");
            // $table->time("appointment_end");
            $table->enum("payment", ["Cash", "Credit", "Trade"]);
            $table->enum("order_status", ["Processed", "Finished", "Cancelled"]);
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("slot_id");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("slot_id")->references("id")->on("slots");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
