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
        Schema::table('appfiy_build_domain', function (Blueprint $table) {
            $table->string('android_push_notification_url')->nullable();
            $table->string('ios_push_notification_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appfiy_build_domain', function (Blueprint $table) {
            $table->dropColumn('android_push_notification_url');
            $table->dropColumn('ios_push_notification_url');
        });
    }
};
