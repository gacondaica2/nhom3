<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableWard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ward', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->comment('ten xa/phuong');
            $table->string('ghn_id')->comment('ghn id');
            $table->string('district_id')->comment('id district');
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
        Schema::dropIfExists('table_ward');
    }
}
