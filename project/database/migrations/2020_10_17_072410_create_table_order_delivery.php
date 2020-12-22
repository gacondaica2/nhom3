<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderDelivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Order_delivery', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->comment('order id');
            $table->string('name')->comment('ten nguoi mua');
            $table->string('province_id')->comment('tinh/Thanh pho');
            $table->string('district_id')->comment('quan/huyen');
            $table->string('ward_id')->comment('xa/phuong');
            $table->string('address')->comment('dia chi');
            $table->string('phone')->comment('sdt');
            $table->string('email')->comment('email');
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
        Schema::dropIfExists('table_order_delivery');
    }
}
