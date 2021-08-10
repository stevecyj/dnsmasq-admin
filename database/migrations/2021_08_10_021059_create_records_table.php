<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domain_id')->comment('域名ID');
            $table->string('type', 16)->comment('類型');
            $table->string('record', 32)->comment('記錄');
            $table->string('content')->comment('記錄值');
            $table->string('remark')->nullable()->comment('備註');
            $table->timestamps();
            $table->unique(['domain_id', 'type', 'record'], 'domain_record');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
