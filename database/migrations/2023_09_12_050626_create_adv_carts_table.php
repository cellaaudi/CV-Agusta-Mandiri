<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adv_carts', function (Blueprint $table) {
            $table->unsignedBigInteger("appointment_id");
            $table->unsignedBigInteger("adv_product_id");
            $table->timestamps();

            $table->foreign("appointment_id")->references("id")->on("appointments");
            $table->foreign("adv_product_id")->references("id")->on("adv_products");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adv_carts');
    }
}
