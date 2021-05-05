<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',60)->nullable();
            $table->integer('category_id',false)->nullable();
            $table->mediumText('description')->nullable();
            $table->decimal('price',15,2)->nullable();
            $table->integer('make',false)->nullable();
            $table->timestamps();
        });
        $tb_products = array(
            array('id' => '1','name' => 'Nikon D850','category_id' => '1','description' => 'Nikon D850','price'=>'20134.34','make'=>'2018'),
            array('id' => '2','name' => 'Nikon D950','category_id' => '1','description' => 'Nikon D950','price'=>'21074.34','make'=>'2020'),
            array('id' => '3','name' => 'Canon M50','category_id' => '2','description' => 'Canon M50','price'=>'35000.00','make'=>'2018'),
            array('id' => '4','name' => 'Canon M67','category_id' => '2','description' => 'Canon M67','price'=>'36000.00','make'=>'2019'),
        );
        DB::table('products')->insert($tb_products);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
