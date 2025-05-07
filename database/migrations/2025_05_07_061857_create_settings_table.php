<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('lab_description')->nullable();
            $table->timestamps();
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->integer('order')->default(0)->after('content');
        });
    }

    public function down(): void
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};




