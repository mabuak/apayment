<?php
/**
 * Created By DhanPris
 *
 * @Filename     2018_08_07_075804_create_invoices_table.php
 * @LastModified 8/7/18 4:39 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'invoices',
            function (Blueprint $table) {
                $table->increments('id');
                $table->char('invoice_no', 20);
                $table->double('grand_total');
                $table->char('payment_method', 50);
                $table->char('paypal_token', 20);
                $table->char('status', 20);
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
        Schema::dropIfExists('invoices');
    }
}
