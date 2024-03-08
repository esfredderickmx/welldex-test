<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('bill_landings', function (Blueprint $table) {
      $table->id();
      $table->string('reference');
      $table->foreignId('customer_id')->nullable()->constrained()->cascadeOnUpdate()->noActionOnDelete();
      $table->foreignId('shipping_line_id')->nullable()->constrained()->cascadeOnUpdate()->noActionOnDelete();
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('bill_landings');
  }
};
