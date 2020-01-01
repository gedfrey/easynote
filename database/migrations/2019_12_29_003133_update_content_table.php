<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contents',function (Blueprint $table) {
            $table->bigInteger('text_id')->nullable();
            $table->foreign('text_id')->references('id')->on('texts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents',function (Blueprint $table){
           $table->dropForeign('contents_text_id_foreign');
           $table->dropColumn('text_id');
        });
    }
}
