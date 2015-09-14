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
            $table->string('cid', 50)->unique();

            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->unsignedInteger('dc_location');
            $table->foreign('dc_location')->references('id')->on('dc_location');

            $table->unsignedInteger('service_type');
            $table->foreign('service_type')->references('id')->on('service_type');

            $table->boolean('status')->default(false);
            $table->string('ip_address', 50);
            $table->string('netmask', 50);
            $table->string('gateway', 50);
            $table->string('rack_location', 10);
            $table->string('u_location', 10);
            $table->string('port', 10);
            $table->date('fpb_date')->nullable();
            $table->date('of_date')->nullable();
            $table->date('ob_date')->nullable();
            $table->string('power', 50);
            $table->string('supporting_cid', 50);
            $table->text('notes');
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
        //
        Schema::drop('dc_customers');
    }
}
