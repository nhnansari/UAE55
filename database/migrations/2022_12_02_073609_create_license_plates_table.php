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
        Schema::create('license_plate_formats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->boolean('supports_letter')->default(false)->nullable();
            $table->boolean('print_contact')->default(false)->nullable();
            $table->string('number_font_size')->nullable();
            $table->string('number_font_file')->nullable();
            $table->decimal('number_x')->nullable();
            $table->decimal('number_y')->nullable();
            $table->decimal('letter_x')->nullable();
            $table->decimal('letter_y')->nullable();
            $table->decimal('contact_x')->nullable();
            $table->decimal('contact_y')->nullable();
            $table->string('letter_font_size')->nullable();
            $table->decimal('contact_font_size')->nullable();
            $table->decimal('stamp_x')->nullable();
            $table->decimal('stamp_y')->nullable();
            $table->string('contact_font_file')->nullable();
            $table->integer('status')->nullable();
            $table->string('emirates')->nullable();
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
        Schema::dropIfExists('license_plates');
    }
};
