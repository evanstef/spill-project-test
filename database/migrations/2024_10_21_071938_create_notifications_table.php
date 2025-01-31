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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('post_id')->constrained('posts')->onDelete('cascade')->nullable();
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->foreignUuid('action_by')->constrained('users')->onDelete('cascade'); //user yang melakukan like,comment,dan juga follow
            $table->string('type')->default('like'); //untuk tipe notifnya
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
