<?php

namespace App\Livewire\Store;

use App\Models\Address;
use App\Models\Provider;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateProvider extends Component {

  #[Validate('required|string|max:80')]
  public $name;
  #[Validate('required|numeric|max_digits:10')]
  public $phone_number;
  #[Validate('required|string|max:50')]
  public $country;
  #[Validate('required|string|max:50')]
  public $state;
  #[Validate('required|numeric|max_digits:6')]
  public $zip;
  #[Validate('required|string|max:50')]
  public $division;
  #[Validate('required|string|max:50')]
  public $street;
  #[Validate('max:8')]
  public $number;

  public function render() {
    return view('livewire.store.create-provider');
  }

  public function storeProvider() {
    $this->validate();

    $created_provider = Provider::create($this->all());
    $created_provider->address()->save(Address::create($this->all()));

    $this->resetForm();

    $this->dispatch('show-message', message: 'Proveedor añadido correctamente.', type: 'success', modal: 'create-provider');
  }

  public function resetForm() {
    $this->reset();
    $this->resetErrorBag();
  }
}
