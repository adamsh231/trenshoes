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
            $table->string('sku')->nullable();
            $table->double('price');
            $table->longText('description')->nullable();
            $table->boolean('is_displayed')->default(1);
            $table->dateTime('start_promo')->nullable();
            $table->dateTime('end_promo')->nullable();
            $table->double('promo_price')->nullable();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('material_upper')->nullable();
            $table->string('material_outer_sole')->nullable();
            $table->longText('care_label')->nullable();
            $table->longText('measurements')->nullable();
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
