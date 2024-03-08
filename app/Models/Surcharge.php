<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Surcharge extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'cost',
    'concept',
  ];

  public function import(): BelongsTo {
    return $this->belongsTo(Import::class);
  }
}
