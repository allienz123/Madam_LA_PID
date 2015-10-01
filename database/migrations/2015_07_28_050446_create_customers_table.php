<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('customers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('customer_name', 60)->unique();
            $table->unsignedInteger('customers_segment')->nullable();
            $table->foreign('customers_segment')->references('id')->on('customers_segment');
            $table->string('customer_sales', 50);
            $table->string('customer_cp', 50)->nullable();;
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedInteger('user_id_edited')->nullable();
            $table->foreign('user_id_edited')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}