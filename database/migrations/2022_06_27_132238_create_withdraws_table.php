<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->string('request_num')->comment('رقم الطلب');
            $table->string('request_date')->comment('تاريخ الطلب');
            $table->string('withdraw_value')->comment('المبلغ المراد سحبه');
            $table->string('withdraw_method')->default(0)->comment('وسيلة السحب');
            $table->string('withdraw_balance')->default(0)->comment('الرصيد');
            $table->tinyInteger('withdraw_statue')->default(0)->comment('حالة الطلب');
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('withdraws');
    }
}
