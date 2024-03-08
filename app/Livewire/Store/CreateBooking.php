<?php

namespace App\Livewire\Store;

use App\Models\Booking;
use App\Models\Ship;
use App\Models\Shipment;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateBooking extends Component {

  #[Validate('exists:ships,id')]
  public $ship;
  #[Validate('exists:shipments,id')]
  public $shipment;
  #[Validate('required|numeric|max_digits:12|unique:bookings,number')]
  public $number;

  public function render() {
    return view('livewire.store.create-booking');
  }

  public function storeBooking() {
    $this->validate();

    $created_booking = Booking::create($this->all());
    $created_booking->ship()->associate(Ship::find($this->ship))->save();
    $created_booking->shipment()->associate(Shipment::find($this->shipment))->save();

    $this->resetForm();

    $this->dispatch('show-message', message: 'Booking añadido correctamente.', type: 'success', modal: 'create-booking');
  }

  public function resetForm() {
    $this->reset();
    $this->resetErrorBag();

    $this->dispatch('reset-modal-selection', modal: 'create-booking');
  }
}
