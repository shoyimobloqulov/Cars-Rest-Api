<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default(null);
            $table->text('desc')->default(null);

            $table->string('icon1')->default(null);
            $table->string('title1')->default(null);
            $table->text('desc1')->default(null);

            $table->string('icon2')->default(null);
            $table->string('title2')->default(null);
            $table->text('desc2')->default(null);

            $table->string('icon3')->default(null);
            $table->string('title3')->default(null);
            $table->text('desc3')->default(null);

            $table->string('icon4')->default(null);
            $table->string('title4')->default(null);
            $table->text('desc4')->default(null);
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
        Schema::dropIfExists('transports');
    }
}
