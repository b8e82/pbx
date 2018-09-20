<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSippeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sippeers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customers_id')->unsigned();
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('name', 50)->nullable(true);
            $table->string('username')->unique();
            $table->string('password');
            $table->string('transport', 50)->nullable(true);
            $table->string('context');
            $table->string('callerid', 20)->nullable(true);
            $table->string('dtmf_mode')->nullable(true)->default('rfc4733');
            $table->boolean('remoteregister')->default(false);
            $table->boolean('media_encryption')->default(false);
            $table->boolean('enableiprestrict')->default(false);
            $table->boolean('aggregate_mwi')->default(true);
            $table->string('mailboxes', 50)->nullable(true);
            $table->string('language', 10)->default('pt');
            $table->string('allow')->default('ulaw');
            $table->enum('endpttype', ['exten', 'provider', 'voip'])->default('exten');
            $table->boolean('authenticate_qualify')->default(false);
            $table->integer('qualify_frequency')->default(60);
            $table->integer('max_contacts')->default(1);
            $table->boolean('remove_existing')->default(true);
            $table->integer('max_time_ring')->default(60);
            $table->string('fullname')->nullable(true);
            $table->string('email')->nullable(true);
            $table->boolean('dnd')->default(false);
            $table->string('mobilephone', 20)->nullable(true);
            $table->boolean('active_mailbox')->default(false);
            $table->integer('pin_mailbox')->nullable(true);
            $table->boolean('email_to_mailbox')->default(false);
            $table->boolean('always_deviate')->default(false);
            $table->string('always_deviate_destiny', 20)->nullable(true);
            $table->boolean('divert_unanswered')->default(false);
            $table->string('divert_unanswered_destiny', 20)->nullable(true);
            $table->boolean('divert_on_busy')->default(false);
            $table->string('divert_on_busy_destiny', 20)->nullable(true);
            $table->boolean('play_simultaneously')->default(false);
            $table->string('prefix', 20)->nullable(true);
            $table->string('ringtone_folder')->nullable(true);
            $table->string('ringtone_music')->nullable(true);
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
        Schema::dropIfExists('sippeers');
    }
}
