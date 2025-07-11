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
        Schema::table('users', function (Blueprint $table) {
            $table->string('password_hash', 255); 
            $table->string('first_name', 50);
            $table->string('last_name', 50)->nullable();
            $table->string('phone', 15)->nullable();
            $table->enum('role', ['tenant', 'owner', 'admin'])->default('tenant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'password_hash',
                'first_name',
                'last_name',
                'phone',
                'role',
            ]);
        });
    }
};
