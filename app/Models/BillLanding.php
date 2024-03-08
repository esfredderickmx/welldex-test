<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BillLanding extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'reference',
  ];

  public function customer(): BelongsTo {
    return $this->belongsTo(Customer::class);
  }
  public function shippingLine(): BelongsTo {
    return $this->belongsTo(ShippingLine::class);
  }

  public function imports(): HasMany {
    return $this->hasMany(Import::class);
  }
}
