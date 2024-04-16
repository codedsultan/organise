<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->index();
            // $table->foreign('event_id')->references('id')->on('events');
            $table->string('title');
            $table->string('type');
            $table->text('description');
            $table->decimal('price');
            $table->integer('max_admit')->default(1);
            $table->integer('quantity_available')->nullable();
            $table->integer('quantity_sold')->nullable();
            $table->boolean('is_paused')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
