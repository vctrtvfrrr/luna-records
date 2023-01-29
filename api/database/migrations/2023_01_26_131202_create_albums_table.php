<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('albums', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 120);
            $table->string('artist', 80);
            $table->string('cover')->nullable();
            $table->date('released_at')->nullable();
            $table->unsignedInteger('duration')->default(0);
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('price')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
