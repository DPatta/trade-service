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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('trader_id')->comment('id ของผู้ร่วมทำรายการ')->nullable(true);
            $table->unsignedBigInteger('currency_id')->nullable(false);
            $table->string('amount')->nullable(false);
            $table->string('price')->nullable(false);
            $table->enum('status',['SUCCESS','PENDING','REJECT'])->nullable(false);
            $table->enum('method',['SELL','BUY'])->nullable(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('trader_id')->references('id')->on('users');
            $table->foreign('currency_id')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
