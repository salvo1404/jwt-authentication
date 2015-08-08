<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'activations',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('email')->unique();
                $table->string('code');
                $table->boolean('used')->default(0);

                $table->timestamp('created_at');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activations');
    }
}
