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
            $table->string('amount_given');
            $table->string('total_sales');
            $table->string('total_sales_vat');
            $table->string('amount_due');
            $table->string('profit');
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
