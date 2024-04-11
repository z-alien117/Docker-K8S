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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('Date');
            $table->unsignedBigInteger('ClientId');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ClientId')
                    ->references('id')->on('clients');
                    // ask the desired action for on delete or on update
                    // ->onDelete('cascade')
                    // ->onUpdate('cascade');
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
};
