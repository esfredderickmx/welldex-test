<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('addresses', function (Blueprint $table) {
      $table->id();
      $table->string('country');
      $table->string('state');
      $table->integer('zip')->nullable();
      $table->string('division')->nullable();
      $table->string('street')->nullable();
      $table->string('number')->nullable();
      $table->unsignedBigInteger('addressable_id')->nullable();
      $table->string('addressable_type')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('addresses');
  }
};
