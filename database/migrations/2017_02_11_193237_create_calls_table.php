<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('registered_by')->unsigned(); // $user->currentUser()
            $table->foreign('registered_by')->references('id')->on('users');

            $table->string('agent_code');
            $table->string('client_code');
            $table->string('client_name');
            $table->string('client_phone');
            $table->boolean('pending')->default(true);
            $table->mediumText('description');
            $table->unsignedInteger('follow_id')->nullable();

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
        Schema::dropIfExists('calls');
    }
}
