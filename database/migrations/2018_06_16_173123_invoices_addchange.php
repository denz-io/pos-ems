<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoicesAddChange extends Migration
{
    public function up()
    {
        Schema::table('invoices', function($table) {
            $table->string('change');
        });
    }

    public function down()
    {
	Schema::table('invoices', function($table) {
	    $table->dropColumn('change');
	});
    }
}
