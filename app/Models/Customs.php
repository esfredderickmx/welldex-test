<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customs extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'number',
  ];

  public function imports(): HasMany {
    return $this->hasMany(Import::class);
  }
}
