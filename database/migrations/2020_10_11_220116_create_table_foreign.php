<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('cascade');
        });
        Schema::table('picture', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('color')->onDelete('cascade');
        });
        Schema::table('stock', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('color')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('size')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
        });
        Schema::table('picture', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['color_id']);
        });
        Schema::table('stock', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['color_id']);
            $table->dropForeign(['size_id']);
        });
    }
}
