<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Provider extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'name',
    'phone_number',
  ];

  public function address(): MorphOne {
    return $this->morphOne(Address::class, 'addressable');
  }
}
