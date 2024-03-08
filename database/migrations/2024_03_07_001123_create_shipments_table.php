<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('shipments', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->foreignId('provider_id')->nullable()->constrained()->cascadeOnUpdate()->noActionOnDelete();
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('shipments');
  }
};
