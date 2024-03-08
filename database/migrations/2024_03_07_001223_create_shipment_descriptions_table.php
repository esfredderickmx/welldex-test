<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('shipment_descriptions', function (Blueprint $table) {
      $table->id();
      $table->integer('gross_weight');
      $table->integer('size');
      $table->integer('items');
      $table->string('dimensions');
      $table->string('brand');
      $table->string('type');
      $table->foreignId('shipment_id')->nullable()->constrained()->cascadeOnUpdate()->noActionOnDelete();
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('shipment_descriptions');
  }
};
