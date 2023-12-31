<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orderitem_has_extra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderitems_id');
            $table->unsignedBigInteger('extras_id');

            $table->foreign('orderitems_id')->references('id')->on('orderitems');
            $table->foreign('extras_id')->references('id')->on('extras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitem_has_extra');
    }
};
