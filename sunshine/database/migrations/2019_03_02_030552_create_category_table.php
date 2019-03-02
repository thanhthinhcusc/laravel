<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('category', function (Blueprint $table) {
            $table->unsignedTinyInteger('Id')->autoIncrement();
            $table->string('Name',50);
            $table->timestamp('DateCreated')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('DateModified')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('Status')->default('2');         
            $table->unique('Name');
        
            
        });
        DB::statement("ALTER TABLE `category`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
