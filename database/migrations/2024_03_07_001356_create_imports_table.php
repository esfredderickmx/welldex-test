<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('imports', function (Blueprint $table) {
      $table->id();
      $table->string('reference');
      $table->enum('status', [1, 2, 3, 4, 5, 6])->default(1);
      $table->date('sail_date');
      $table->date('arrive_date');
      $table->foreignId('operator_id')->nullable()->constrained()->cascadeOnUpdate()->noActionOnDelete();
      $table->foreignId('bill_landing_id')->nullable()->constrained()->cascadeOnUpdate()->noActionOnDelete();
      $table->foreignId('booking_id')->nullable()->constrained()->cascadeOnUpdate()->noActionOnDelete();
      $table->foreignId('origin_terminal')->nullable()->constrained('terminals')->cascadeOnUpdate()->noActionOnDelete();
      $table->foreignId('destiny_terminal')->nullable()->constrained('terminals')->cascadeOnUpdate()->noActionOnDelete();
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('imports');
  }
};
