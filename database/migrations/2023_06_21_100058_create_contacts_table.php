<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('desc')->default('null');
            $table->string('call')->default('null');
            $table->string('mc')->default('null');
            $table->string('dot')->default('null');
            $table->string('location')->default('null');
            $table->string('facebook_link')->default('null');
            $table->string('instagram_link')->default('null');
            $table->string('telegram_link')->default('null');
            $table->string('linkedin_link')->default('null');
            $table->string('twitter_link')->default('null');
            $table->string('youtube_link')->default('null');
            $table->string('logo')->default('null');
            $table->string('copyright_name')->default('null');
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
        Schema::dropIfExists('contacts');
    }
}
