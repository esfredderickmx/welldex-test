<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('bookings', function (Blueprint $table) {
      $table->id();
      $table->integer('number');
      $table->foreignId('shipment_id')->nullable()->constrained()->cascadeOnUpdate()->noActionOnDelete();
      $table->foreignId('ship_id')->nullable()->constrained()->cascadeOnUpdate()->noActionOnDelete();
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('bookings');
  }
};
