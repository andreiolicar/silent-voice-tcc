<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_records', function (Blueprint $table) {
            $table->id();
            $table->string('title', 120)->unique();
            $table->string('category', 32);
            $table->string('summary', 240);
            $table->text('body');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_records');
    }
};
