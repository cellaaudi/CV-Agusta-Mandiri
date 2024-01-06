<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvAppointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adv_appoints', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->time("start");
            $table->time("end");
            $table->enum("payment", ["Cash", "Credit", "Trade"]);
            $table->enum("order_status", ["Processed", "Finished", "Cancelled"])->default("Processed");
            $table->string('product_id');
            $table->foreignId("user_id")->constrained('users');
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
        Schema::dropIfExists('adv_appoints');
    }
}
