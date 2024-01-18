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
        Schema::create('users_business', function (Blueprint $table) {
            $table->foreignUuid('user_id');
            $table->foreignUuid('business_id');

            $table->foreign('user_id')
                ->references('id')->on('users')->cascadeOnDelete();

            $table->foreign('business_id')
                ->references('id')->on('business')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_business');
    }
};