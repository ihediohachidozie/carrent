<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookOnHoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_on_holds', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount');
            $table->string('firstname');
            $table->string('lastname');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->string('reference');
            $table->string('status');
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
        Schema::dropIfExists('book_on_holds');
    }
}
