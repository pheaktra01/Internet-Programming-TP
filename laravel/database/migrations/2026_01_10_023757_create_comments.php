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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            // polymorphic relationship fields
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');

            // user reference
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // index for polymorphic relation
            $table->index(['commentable_id', 'commentable_type']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
