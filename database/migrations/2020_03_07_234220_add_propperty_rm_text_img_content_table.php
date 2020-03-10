<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProppertyRmTextImgContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->bigInteger('property_id')->nullable();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->dropForeign('contents_image_id_foreign');
            $table->dropColumn('image_id');
            $table->dropForeign('contents_text_id_foreign');
            $table->dropColumn('text_id');
            $table->text('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->dropForeign('contents_property_id_foreign');
            $table->dropColumn('property_id');
            $table->bigInteger('text_id')->nullable();
            $table->foreign('text_id')->references('id')->on('texts')->onDelete('cascade');
            $table->bigInteger('image_id')->nullable();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
        });
    }
}
