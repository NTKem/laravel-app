<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profile_id');
            $table->string('menu_id');
            $table->string('line_height')->nullable();
            $table->string('font_size')->nullable();
            $table->string('font_spacing')->nullable();
            $table->string('font_family')->nullable();
            $table->string('color')->nullable();
            $table->string('highlight')->nullable();
            $table->string('ship_link')->nullable();
            $table->string('screen_settings')->nullable();
            $table->string('zoom')->nullable();
            $table->string('contrast')->nullable();
            $table->string('tool_tip')->nullable();
            $table->string('other')->nullable();
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
        Schema::drop('settings');
    }
}
