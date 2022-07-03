<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packeges', function (Blueprint $table) {
            $table->id();
            $table->string('packege_name');
            $table->integer('packege_code');
            $table->string('packege_feature_1')->nullable();
            $table->string('packege_feature_2')->nullable();
            $table->string('packege_feature_3')->nullable();
            $table->string('packege_feature_4')->nullable();
            $table->string('packege_feature_5')->nullable();
            $table->string('packege_price');
            $table->string('packege_time')->nullable();
            $table->decimal('packege_rate', 10, 1);
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
        Schema::dropIfExists('packeges');
    }
}
