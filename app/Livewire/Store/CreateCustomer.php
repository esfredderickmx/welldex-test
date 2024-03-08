<?php

namespace App\Livewire\Store;

use App\Models\Address;
use App\Models\Customer;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCustomer extends Component {

  #[Validate('required|string|max:80')]
  public $name;
  #[Validate('required|numeric|max_digits:10')]
  public $phone_number;
  #[Validate]
  public $type;
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

  protected function rules() {
    return [
      'type' => [
        'required',
        Rule::in(['person', 'company'])
      ],
    ];
  }

  public function render() {
    return view('livewire.store.create-customer');
  }

  public function storeCustomer() {
    $this->validate();

    $created_customer = Customer::create($this->all());
    $created_customer->address()->save(Address::create($this->all()));

    $this->resetForm();

    $this->dispatch('show-message', message: 'Cliente añadido correctamente.', type: 'success', modal: 'create-customer');
  }

  public function resetForm() {
    $this->reset();
    $this->resetErrorBag();

    $this->dispatch('reset-modal-selection', modal: 'create-customer');
  }
}
