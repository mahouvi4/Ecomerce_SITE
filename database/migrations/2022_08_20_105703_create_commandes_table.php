<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('firstname');
            $table->string('name');
            $table->string('country');
            $table->string('rue');
            $table->string('city');
            $table->string('state');
            $table->string('codzip');
            $table->string('tel');
            $table->string('email');
            $table->string('codcommande');
            $table->string('adresscommande')->nullable();
            $table->string('infosuplement')->nullable();
            $table->string('totalcommande');
            $table->integer('statut');
            $table->softDeletes();
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
        Schema::dropIfExists('commandes');
    }
};
