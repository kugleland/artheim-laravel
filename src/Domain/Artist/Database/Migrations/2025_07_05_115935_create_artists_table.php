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
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable()->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('alias')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->text('bio')->nullable();
            $table->string('website')->nullable();
            $table->string('profile_image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
