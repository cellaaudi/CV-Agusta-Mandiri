<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("photo");
            $table->year("year");
            $table->longtext("description");
            $table->unsignedBigInteger('trade_category_id');
            $table->unsignedBigInteger('appointment_id');
            $table->timestamps();

            $table->foreign("trade_category_id")->references("id")->on("trade_categories");
            $table->foreign("appointment_id")->references("id")->on("appointments");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trades');
    }
}
