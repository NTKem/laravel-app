<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableDedaultProlife extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_default', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profile_id');
            $table->string('line_height')->nullable();
            $table->string('font_size')->nullable();
            $table->string('font_spacing')->nullable();
            $table->string('font_family')->nullable();
            $table->string('color_more')->nullable();
            $table->string('highlight_title')->nullable();
            $table->string('highlight_focus')->nullable();
            $table->string('highlight_links')->nullable();
            $table->string('skip_title')->nullable();
            $table->string('skip_focus')->nullable();
            $table->string('skip_links')->nullable();
            $table->string('screen_settings')->nullable();
            $table->string('screen_ruler')->nullable();
            $table->string('screen_cursor')->nullable();
            $table->string('zoom')->nullable();
            $table->string('contrast')->nullable();
            $table->string('tooltip_permanent')->nullable();
            $table->string('tooltip_mouseover')->nullable();
            $table->string('text_mode')->nullable();
            $table->timestamps();
        });
        for($i = 1; $i <= 5;$i++){
            DB::table('profile_default')->insert(
                array(
                    'profile_id' => $i
                )
            );
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
