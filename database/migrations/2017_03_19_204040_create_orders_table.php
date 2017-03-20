<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shopping_cart_id')->unsigned();
            $table->string('line1');
            $table->string('line2')->nullable();
            $table->string('postal_code');
            $table->string('country_code');
            $table->string('state');
            $table->string('recipient_name');
            $table->string('email');
            $table->string('status')->default('created');
            $table->string('guide_number')->nullable();
            $table->decimal('total', 9, 2);
            $table->timestamps();

            $table->foreign('shopping_cart_id')
                    ->references('id')
                    ->on('shopping_carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
