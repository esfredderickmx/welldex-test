<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'country',
    'state',
    'zip',
    'division',
    'street',
    'number',
  ];

  public function addressable(): MorphTo {
    return $this->morphTo();
  }
}
