<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',60)->nullable();
            $table->string('type',60)->nullable();
            $table->string('model',60)->nullable();
            $table->timestamps();
        });

        $tb_categories = array(
            array('id' => '1','name' => 'Nikon','type' => 'Mirrorless','model' => '2020'),
            array('id' => '2','name' => 'Canon','type' => 'Lens','model' => '2018'),
        );
        DB::table('categories')->insert($tb_categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
