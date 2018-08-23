<?php
/**
 * Created By DhanPris
 *
 * @Filename     2018_08_07_083536_create_invoice_items_table.php
 * @LastModified 8/7/18 4:19 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'invoice_items',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->double('price', 10, 2);
                $table->timestamps();

                $table->unsignedInteger('invoice_id');
                $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('invoice_items');
    }
}
