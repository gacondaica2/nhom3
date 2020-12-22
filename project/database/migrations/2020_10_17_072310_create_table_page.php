<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Page', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('user nguoi dang nhap');
            $table->text('title')->comment('duong dan');
            $table->string('avatar_id', 50)->comment('Hinh anh');
            $table->string('content')->comment('noi dung');
            $table->longText('description')->comment('noi dung');
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
        Schema::dropIfExists('table_page');
    }
}
