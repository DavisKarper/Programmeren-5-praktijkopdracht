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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255);
            $table->text('entries');
            $table->integer('page')->nullable();
            $table->string('reqAttune', 255)->nullable();
            $table->integer('weight')->nullable();

            $table->foreignId('type_id')->constrained();
            $table->foreignId('source_id')->constrained();
            $table->foreignId('rarity_id')->constrained();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
