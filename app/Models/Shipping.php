<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipping extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'fee',
    'payment_method',
  ];

  public function import(): BelongsTo {
    return $this->belongsTo(Import::class);
  }
}
