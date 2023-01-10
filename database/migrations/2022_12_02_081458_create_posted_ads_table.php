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
        Schema::create('posted_ads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title')->nullable();
            $table->string('contact')->nullable();
            $table->string('description')->nullable();
            $table->string('emirates')->nullable();
            $table->decimal('price')->nullable();
            $table->string('picture')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('status')->default('pending');
            $table->string('slug')->default('');
            $table->string('license_number')->default('');
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
        Schema::dropIfExists('posted_ads');
    }
};
