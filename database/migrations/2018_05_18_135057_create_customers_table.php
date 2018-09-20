<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('companies_id')->unsigned();
            $table->foreign('companies_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('num_client');
            $table->string('nif', 12)->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('local')->nullable(true);
            $table->string('cod_postal')->nullable(true);
            $table->string('telef')->nullable(true);
            $table->string('telef2')->nullable(true);
            $table->string('fax')->nullable(true);
            $table->string('responsavel')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('telef3')->nullable(true);
            $table->string('domain')->unique();
            $table->tinyInteger('apply', 0)->nullable(true);
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
        Schema::dropIfExists('customers');
    }
}
