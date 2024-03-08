<?php

namespace App\Livewire\Store;

use App\Models\Address;
use App\Models\Terminal;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateTerminal extends Component {

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
    return view('livewire.store.create-terminal');
  }

  public function storeTerminal() {
    $this->validate();

    $created_terminal = Terminal::create($this->all());
    $created_terminal->address()->save(Address::create($this->all()));

    $this->resetForm();

    $this->dispatch('show-message', message: 'Terminal añadida correctamente.', type: 'success', modal: 'create-terminal');
  }

  public function resetForm() {
    $this->reset();
    $this->resetErrorBag();
  }
}
