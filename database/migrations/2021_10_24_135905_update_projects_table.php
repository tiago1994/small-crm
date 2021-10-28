<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('find_us_id')->after('step_id')->nullable();
            $table->foreign('find_us_id')->references('id')->on('find_us');
            $table->text('comment_1')->nullable();
            $table->text('comment_2')->nullable();
            $table->text('comment_3')->nullable();
            $table->text('comment_4')->nullable();
            $table->text('comment_5')->nullable();
            $table->text('comment_6')->nullable();
        });
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
