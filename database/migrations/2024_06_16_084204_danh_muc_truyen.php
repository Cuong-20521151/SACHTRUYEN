<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DanhMucTruyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DanhMuc', function (Blueprint $table) {
            $table->id();
            $table->string('TenDanhMuc')->unique();
            $table->string('TenSlug');
            $table->text('NoiDungDanhMuc');
            $table->boolean('KichHoat');
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
        Schema::dropIfExists('DanhMuc');
    }
}
