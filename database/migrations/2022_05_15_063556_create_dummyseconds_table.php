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
        Schema::create('dummyseconds', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            
            $table->float('instock')->default(0);
            $table->float('outstock')->default(1);
            $table->float('unitEqualsTo');
            $table->float('bonus')->default(0);
            $table->float('quantity')->default(0);
            $table->string('units');
            $table->float('rate')->default(1);
            $table->date('date');
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
        Schema::dropIfExists('dummyseconds');
    }
};
