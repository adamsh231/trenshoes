<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->string('name');
            $table->string('sku');
            $table->double('price');
            $table->longText('description');
            $table->boolean('is_displayed');
            $table->dateTime('start_promo');
            $table->dateTime('end_promo');
            $table->double('promo_price');
            $table->enum('gender', ['male', 'female']);
            $table->string('material_upper');
            $table->string('material_outer_sole');
            $table->longText('care_label');
            $table->longText('measurements');
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
        Schema::dropIfExists('product');
    }
}
