<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoRespondersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_responders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('language');
            $table->string('first_pic');
            $table->string('first_phrase');
            $table->string('second_pic_android');
            $table->string('second_pic_ios');
            $table->string('second_phrase');
            $table->string('phrase_after_phone');
            $table->string('captcha_output_phrase');
            $table->string('logout_phrase');
            $table->string('login_phrase');
            $table->string('incorrect_phone_tips');
            $table->boolean('state')->default(true);
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
        Schema::dropIfExists('auto_responders');
    }
}
