<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Media', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('media id ');
            $table->string('size')->nullable()->comment('kich co ');
            $table->string('dimension')->nullable()->comment('chieu dai rong  ');
            $table->string('type')->nullable()->comment('loai hinh');
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
        Schema::dropIfExists('table_media');
    }
}
