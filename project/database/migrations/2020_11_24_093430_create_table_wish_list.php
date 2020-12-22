<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableWishList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wish_list', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->comment('user id');
            $table->string('product_id')->comment('is san pham');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('table_wish_list');
    }
}
