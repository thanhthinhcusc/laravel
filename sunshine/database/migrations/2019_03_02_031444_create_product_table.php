<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Name',200);
            $table->integer('OriginalPrice  ')->default('0');
            $table->integer('Price')->default('0');
            $table->string('Image',200);
            $table->text('Content');
            $table->string('Description',50);
            $table->timestamp('DateCreated ')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('DateModified ')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('Status')->default('2');
            $table->unsignedTinyInteger('CategoryId');
            $table->foreign('CategoryId')->references('Id')->on('category')->onDelete('cascade')->onUpdate('cascade');
        });
        DB::statement("ALTER TABLE `product`");
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
