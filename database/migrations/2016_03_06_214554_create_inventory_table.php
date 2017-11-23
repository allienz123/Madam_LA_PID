<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('inventory', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('barcode', 20)->unique();
            $table->string('device',255);
            $table->string('sn_ori',255);
            $table->string('sn_la',255);
            $table->string('function');
            $table->text('notes');
            $table->string('images')->nullable();
            $table->boolean('status')->default(false);

            $table->unsignedInteger('belong_to');
            $table->foreign('belong_to')->references('id')->on('customers');

            $table->unsignedInteger('user_id_in')->nullable();
            $table->foreign('user_id_in')->references('id')->on('users')->onDelete('set null');

            $table->unsignedInteger('user_id_out')->nullable();
            $table->foreign('user_id_out')->references('id')->on('users')->onDelete('set null');

            $table->string('pic',255);
            $table->string('company',255);
            
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
        Schema::drop('inventory');
    }
}
