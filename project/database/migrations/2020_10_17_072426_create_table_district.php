<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDistrict extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('District', function (Blueprint $table) {
            $table->id();
            $table->string('ghn_id')->comment('ghn id');
            $table->string('name')->comment('ten quan/huyen');
            $table->string('province_id')->comment('id cua province');
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
        Schema::dropIfExists('table_district');
    }
}
