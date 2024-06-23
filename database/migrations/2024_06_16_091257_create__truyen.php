<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Truyen', function (Blueprint $table) {
            $table->id();
            $table->string('TenTruyen');
            $table->string('TenSlugTruyen');
            $table->string('TacGia');
            $table->text('NoiDungTruyen');
            $table->string('HinhAnh');
            $table->unsignedBigInteger('DanhMuc'); // Assuming DanhMuc is a foreign key
            $table->boolean('KichHoat');
            $table->timestamps();

            $table->foreign('DanhMuc')->references('id')->on('DanhMuc')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Truyen');
    }
}
