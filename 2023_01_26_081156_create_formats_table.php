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
        Schema::create('formats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('spot');
            $table->string('author');
            // $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('formats');
    }
};
