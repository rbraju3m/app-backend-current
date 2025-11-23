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
        Schema::table('appfiy_theme_page', function (Blueprint $table) {
            $table->string('screen_status',10)->default('dynamic');
            $table->string('static_screen_image')->nullable();
            $table->text('static_screen_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appfiy_theme_page', function (Blueprint $table) {
            $table->dropColumn('screen_status');
            $table->dropColumn('static_screen_image');
            $table->dropColumn('static_screen_message');
        });
    }
};
