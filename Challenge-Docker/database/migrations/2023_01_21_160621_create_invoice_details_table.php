<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('InvoiceId');
            $table->unsignedBigInteger('ProductId');
            $table->decimal('Price', $precision=18, $scale=2);
            $table->float('Quantity');
            $table->decimal('Amount', $precision=18, $scale=2)->storedAs('Price * Quantity');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('InvoiceId')
                    ->references('id')->on('invoices');
            $table->foreign('ProductId')
                    ->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
};
