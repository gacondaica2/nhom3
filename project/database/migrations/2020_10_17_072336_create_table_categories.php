<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('tieu de');
            $table->string('slug')->comment('tieu de');
            $table->string('status')->comment('trang thai');
            $table->string('parent_id')->comment('quan he cha con');
            $table->string('description')->nullable()->comment('mo ta so bo');
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
        Schema::dropIfExists('table_categories');
    }
}
