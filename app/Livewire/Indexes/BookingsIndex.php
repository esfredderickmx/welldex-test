<?php

namespace App\Livewire\Indexes;

use App\Models\Booking;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class BookingsIndex extends Component {

  use WithPagination;

  private $bookings;

  #[Title('Bookings')]
  public function render() {
    $this->bookings = Booking::paginate(15);

    if ($this->bookings->currentPage() > $this->bookings->lastPage()) {
      $this->resetPage();
      $this->render();
    }

    return view('livewire.indexes.bookings-index')->with([
      'bookings' => $this->bookings,
    ]);
  }
}
