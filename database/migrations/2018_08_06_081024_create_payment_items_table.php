<?php
/**
 * Created By DhanPris
 *
 * @Filename     2018_08_06_081024_create_payment_items_table.php
 * @LastModified 8/7/18 4:10 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'payment_items',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->double('price', 10, 2);
                $table->char('currency', 5);
                $table->timestamps();

                $table->unsignedInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_items');
    }
}
