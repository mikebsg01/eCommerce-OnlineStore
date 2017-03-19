<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('products', function(Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned()->index();
      $table->string('title');
      $table->text('description');
      $table->decimal('pricing', 9, 2);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('products');
  }
}
