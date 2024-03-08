<?php

namespace App\Livewire\Store;

use App\Models\Address;
use App\Models\Provider;
use App\Models\Shipment;
use App\Models\ShipmentDescription;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateShipment extends Component {

  #[Validate('exists:providers,id')]
  public $provider;
  #[Validate('required|string|max:80')]
  public $name;
  #[Validate('required|string|max:50')]
  public $origin_country;
  #[Validate('required|string|max:50')]
  public $origin_state;
  #[Validate('required|string|max:50')]
  public $destiny_country;
  #[Validate('required|string|max:50')]
  public $destiny_state;
  #[Validate('required|numeric|max_digits:12')]
  public $gross_weight;
  #[Validate('required|numeric|max_digits:12')]
  public $size;
  #[Validate('required|numeric|max_digits:6')]
  public $items;
  #[Validate('required|string')]
  public $dimensions;
  #[Validate('required|string|max:50')]
  public $brand;
  #[Validate]
  public $type;

  protected function rules() {
    return [
      'type' => [
        'required',
        Rule::in(['packages', 'goods'])
      ],
    ];
  }

  public function render() {
    return view('livewire.store.create-shipment');
  }

  public function storeShipment() {
    $this->validate();

    $created_shipment = Shipment::create($this->all());
    $created_shipment->provider()->associate(Provider::find($this->provider))->save();
    $created_shipment->description()->save(ShipmentDescription::create($this->all()));
    $created_shipment->originAddress()->save(Address::create([
      'country' => $this->origin_country,
      'state' => $this->origin_state,
    ]));
    $created_shipment->destinyAddress()->save(Address::create([
      'country' => $this->destiny_country,
      'state' => $this->destiny_state,
    ]));

    $this->resetForm();

    $this->dispatch('show-message', message: 'Mercancía añadida correctamente.', type: 'success', modal: 'create-shipment');
  }

  public function resetForm() {
    $this->reset();
    $this->resetErrorBag();

    $this->dispatch('reset-modal-selection', modal: 'create-shipment');
  }
}
