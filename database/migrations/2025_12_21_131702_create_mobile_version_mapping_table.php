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
        Schema::create('appza_mobile_version_mapping', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobile_app_id')->nullable()->constrained('appza_support_mobile_apps')->nullOnDelete();
            $table->string('mobile_version');
            $table->unsignedInteger('mobile_version_code');
            $table->string('minimum_plugin_version');
            $table->string('latest_plugin_version');
            $table->boolean('force_update')->default(false);
            $table->boolean('is_active')->default(true);
            $table->text('optional_message')->nullable();
            $table->timestamps();

            $table->index('mobile_version_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_version_mapping');
    }
};
