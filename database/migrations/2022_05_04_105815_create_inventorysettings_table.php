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
        Schema::create('inventorysettings', function (Blueprint $table) {
            $table->id();
            $table->string('itemName');
            $table->string('itemDetails')->nullable();
            $table->unsignedBigInteger('itemgroup_id');
            $table->unsignedBigInteger('sub_groups_id');
            $table->unsignedBigInteger('company_id');
            $table->integer('itemStatus')->default(0);
            $table->string('units');
            $table->integer('vatable')->default(0);
            $table->boolean('status')->default(0);
            $table->string('commonCode')->default(0);
            $table->integer('beIn')->default(0);            
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
        Schema::dropIfExists('inventorysettings');
    }
};
