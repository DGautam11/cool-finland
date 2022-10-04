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
        Schema::create('costumer', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->unique();
            $table->string('customer_address')->nullable();
            $table->timestamp('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // delete table if exists

        Schema::dropifExists('posts');
    }
};
