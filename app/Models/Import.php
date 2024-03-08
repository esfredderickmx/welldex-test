<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Import extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'reference',
    'status',
    'sail_date',
    'arrive_date',
  ];

  protected $casts = [
    'sail_date' => 'date',
    'arrive_date' => 'date',
  ];

  public function operator(): BelongsTo {
    return $this->belongsTo(Operator::class);
  }
  public function billLanding(): BelongsTo {
    return $this->belongsTo(BillLanding::class);
  }
  public function booking(): BelongsTo {
    return $this->belongsTo(Booking::class);
  }
  public function origin(): BelongsTo {
    return $this->belongsTo(Terminal::class, 'origin_terminal', 'id');
  }
  public function destiny(): BelongsTo {
    return $this->belongsTo(Terminal::class, 'destiny_terminal', 'id');
  }

  public function surcharge(): HasOne {
    return $this->hasOne(Surcharge::class);
  }
  public function shipping(): HasOne {
    return $this->hasOne(Shipping::class);
  }
}
