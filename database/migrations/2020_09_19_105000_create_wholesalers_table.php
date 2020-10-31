<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWholesalersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wholesalers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('info');
            $table->string('phone', 20);
            $table->string('base_name', 20)->unique();
            $table->smallInteger('city')->default(1);
            $table->smallInteger('type')->default(1);
            $table->smallInteger('state')->default(1);
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
        Schema::dropIfExists('wholesalers');
    }
}
