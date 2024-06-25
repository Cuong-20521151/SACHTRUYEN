<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Chapter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_truyen');
            $table->string('TomTat', 255);
            $table->string('TieuDe', 255);
            $table->string('TenSlugChapter', 255);
            $table->text('NoiDung');
            $table->boolean('KichHoat');
            $table->timestamps();

            $table->foreign('id_truyen')->references('id')->on('truyen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Chapter');
    }
}
