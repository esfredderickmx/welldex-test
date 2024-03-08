<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('surcharges', function (Blueprint $table) {
      $table->id();
      $table->integer('cost');
      $table->string('concept');
      $table->foreignId('import_id')->nullable()->constrained()->cascadeOnUpdate()->noActionOnDelete();
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('surcharges');
  }
};
