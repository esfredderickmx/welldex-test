<?php

namespace App\Livewire\Store;

use App\Models\Ship;
use App\Models\ShippingLine;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateShip extends Component {

  #[Validate('exists:shipping_lines,id')]
  public $shipping_line;
  #[Validate('required|string|max:80')]
  public $name;

  public function render() {
    return view('livewire.store.create-ship');
  }

  public function storeShip() {
    $this->validate();

    $created_ship = Ship::create($this->all());
    $created_ship->shippingLine()->associate(ShippingLine::find($this->shipping_line))->save();

    $this->resetForm();

    $this->dispatch('show-message', message: 'Buque añadido correctamente.', type: 'success', modal: 'create-ship');
  }

  public function resetForm() {
    $this->reset();
    $this->resetErrorBag();

    $this->dispatch('reset-modal-selection', modal: 'create-ship');
  }
}
