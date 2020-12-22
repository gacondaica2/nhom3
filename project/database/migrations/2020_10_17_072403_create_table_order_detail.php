<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Order_detail', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('ten');
            $table->integer('price')->comment('gia');
            $table->integer('qty')->comment('so luong');
            $table->string('order_id')->comment('order id');
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
        Schema::dropIfExists('table_order_detail');
    }
}
