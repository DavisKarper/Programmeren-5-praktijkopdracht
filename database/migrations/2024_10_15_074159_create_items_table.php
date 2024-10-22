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

            $table->string('name', 75);
            $table->text('entries');
            $table->integer('source_id');
            $table->integer('page')->nullable();
            $table->integer('rarity_id');
            $table->string('reqAttune', 100)->nullable();
            $table->integer('weight')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('type_id');

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
