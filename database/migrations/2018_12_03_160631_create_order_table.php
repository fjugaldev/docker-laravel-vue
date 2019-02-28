<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('address_id');
            $table->unsignedInteger('driver_id');
            $table->date('delivery_date');
            $table->time('delivery_time_from');
            $table->time('delivery_time_to');
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('address_id')->references('id')->on('address');
            $table->foreign('driver_id')->references('id')->on('user');
            $table->timestamps();
        });

        $seeder = new OrderTableSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
