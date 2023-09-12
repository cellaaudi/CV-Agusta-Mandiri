<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('photo');
            $table->double('price');
            $table->integer('land_area');
            $table->integer('building_area')->nullable();
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('story')->nullable();
            $table->integer('electricity')->nullable();
            $table->enum('certification', []);
            $table->enum('status', ['Available', 'Sold'])->default('Available');
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
        Schema::dropIfExists('prop_products');
    }
}
