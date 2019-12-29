<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('texts',function(Blueprint $table){
            $table->bigInteger('type_text_id');
            $table->foreign('type_text_id')
                ->references('id')
                ->on('type__texts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('texts', function(Blueprint $table){
            $table->dropForeign('texts_type_text_id_foreign');
            $table->dropColumn('type_text_id');
        });
    }
}
