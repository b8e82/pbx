<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('num_client')->nullable(true);
            $table->string('nif', 12)->unique();
            $table->string('address')->nullable(true);
            $table->string('local')->nullable(true);
            $table->string('cod_postal')->nullable(true);
            $table->string('telef')->nullable(true);
            $table->string('telef2')->nullable(true);
            $table->string('fax')->nullable(true);
            $table->string('responsavel')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('telef3')->nullable(true);
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
        Schema::dropIfExists('companies');
    }
}
