<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_option', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable()->commit('id san pham(thuoc ve san pham nao)');
            $table->string('manufacturer')->nullable()->commit('nha san xuat');
            $table->string('size')->nullable()->commit('kich co ( 101x121)');
            $table->string('internalmemory')->nullable()->commit('Bo nho trong');
            $table->string('ram')->nullable()->commit('ram');
            $table->string('weight_option')->nullable()->commit('khoi luong');
            $table->string('sim')->nullable()->commit('so luong sim');
            $table->string('type_sim')->nullable()->commit('loai sim');
            $table->string('screen')->nullable()->commit('man hinh');
            $table->string('screensize')->nullable()->commit('kich co man hinh');
            $table->string('screenresolution')->nullable()->commit('do phan giai man hinh');
            $table->string('operatingsystem')->nullable()->commit('he dieu hanh');
            $table->string('pin')->nullable()->commit('pin');
            $table->string('feature')->nullable()->commit('dac diem');
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
        Schema::dropIfExists('table_product_option');
    }
}
