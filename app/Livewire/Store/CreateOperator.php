<?php

namespace App\Livewire\Store;

use App\Models\Address;
use App\Models\Operator;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateOperator extends Component {

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
    return view('livewire.store.create-operator');
  }

  public function storeOperator() {
    $this->validate();

    $created_operator = Operator::create($this->all());
    $created_operator->address()->save(Address::create($this->all()));

    $this->resetForm();

    $this->dispatch('show-message', message: 'Operador añadido correctamente.', type: 'success', modal: 'create-operator');
  }

  public function resetForm() {
    $this->reset();
    $this->resetErrorBag();
  }
}
