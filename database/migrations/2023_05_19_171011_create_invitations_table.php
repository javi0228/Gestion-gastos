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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from')->comment('The user who send the invitation');
            $table->unsignedBigInteger('to')->comment('The user who receives the invitation');;
            $table->unsignedBigInteger('menage_id');
            $table->boolean('accepted')->default(0);
            $table->timestamps();

            $table->foreign('from')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('to')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('menage_id')
            ->references('id')
            ->on('menages')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
