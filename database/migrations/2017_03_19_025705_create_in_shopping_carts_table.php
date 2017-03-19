<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInShoppingCartsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('in_shopping_carts', function(Blueprint $table) {
      $table->increments('id');
      $table->integer('product_id')->unsigned();
      $table->integer('shopping_cart_id')->unsigned();
      $table->timestamps();
      
      // foreign keys
      $table->foreign('product_id')->references('id')->on('products');
      $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('in_shopping_carts');
  }
}
