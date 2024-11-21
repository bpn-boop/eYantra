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
        Schema::table( 'users',  function (Blueprint $table): void {
            $table->integer('role')->default(value: 1)->after('email');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table( 'users',  function (Blueprint $table): void {
            $table->dropColumn('role');
        });
    }
};
