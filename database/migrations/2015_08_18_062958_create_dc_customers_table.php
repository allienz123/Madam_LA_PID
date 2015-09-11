<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDcCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('dc_customers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('cid')->unique();

            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->unsignedInteger('dc_location');
            $table->foreign('dc_location')->references('id')->on('dc_location');

            $table->unsignedInteger('service_type');
            $table->foreign('service_type')->references('id')->on('service_type');

            $table->boolean('status')->default(false);
            $table->string('ip_address');
            $table->string('netmask');
            $table->string('gateway');
            $table->string('rack_location', 10);
            $table->string('u_location', 10);
            $table->string('port');
            $table->date('fpb_date')->nullable();
            $table->date('of_date')->nullable();
            $table->date('ob_date')->nullable();
            $table->string('power');
            $table->string('supporting_cid');
            $table->string('notes');

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
        //
        Schema::drop('dc_customers');
    }
}
