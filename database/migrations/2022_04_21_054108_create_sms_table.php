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
        Schema::create('sms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('aws_sent_sms_id');
            $table->string('status')->default(0);
            $table->date('time')->nullable();
            $table->string('retry_count')->default(0);
            $table->string('applicationId')->nullable();
            $table->string('message')->nullable();
            $table->string('sourceAddress')->nullable();
            $table->string('requestId')->nullable();
            $table->string('version')->default('1.0');
            $table->string('encoding')->default('0');

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
        Schema::dropIfExists('sms');
    }
};
