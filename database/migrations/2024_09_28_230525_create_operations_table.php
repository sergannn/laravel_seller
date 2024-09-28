<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->float('sum');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('buyer_id');
            $table->foreign('seller_id')->references('id')->on('organizations');
            $table->foreign('buyer_id')->references('id')->on('organizations');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('operations');
    }
};
