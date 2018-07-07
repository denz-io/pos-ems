<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Invoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('items');
            $table->string('customer')->nullable();
            $table->string('business_style')->nullable();
            $table->string('tin')->nullable();
            $table->string('address')->nullable();
            $table->string('invoice_number');
            $table->string('terms')->nullable();
            $table->integer('amount_given');
            $table->integer('total_sales');
            $table->integer('total_sales_vat');
            $table->integer('amount_due');
            $table->timestamps();
        });
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
