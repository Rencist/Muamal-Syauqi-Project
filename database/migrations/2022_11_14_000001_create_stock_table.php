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
        Schema::create('stock', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('petani_id')->index();
            $table->uuid('pembeli_id')->nullable()->constrained();
            $table->string('stock_type', 64);
            $table->string('name', 128);
            $table->float('jumlah');
            $table->float('harga');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('petani_id')->references('id')->on('user');
            $table->foreign('pembeli_id')->references('id')->on('user');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
};