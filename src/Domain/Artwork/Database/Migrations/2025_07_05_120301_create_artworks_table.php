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
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable()->unique();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->year('year')->nullable();
            $table->string('medium')->nullable(); // fx: olie på lærred
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->integer('depth')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('edition')->nullable();
            $table->integer('edition_size')->nullable();
            $table->integer('edition_number')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('status', ['available', 'sold', 'reserved', 'not_for_sale'])->default('available');
            $table->foreignId('gallery_id')->nullable()->nullOnDelete();
            $table->foreignId('artist_id')->nullable()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artworks');
    }
};
