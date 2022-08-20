<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourite', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('name');
            $table->integer('don_gia');
            $table->integer('so_luong');
            $table->string('avatar_product');
            $table->string('mo_ta');
            $table->integer('khuyen_mai')->nullable();
            $table->integer('id_danhmuc');
            // $table->foreign('id_danhmuc')->references('id')->on('danhmuc');
            $table->integer('kich_thuoc');
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
        Schema::dropIfExists('favourite');
    }
};
