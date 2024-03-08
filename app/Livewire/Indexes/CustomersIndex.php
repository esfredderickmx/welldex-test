<?php

namespace App\Livewire\Indexes;

use App\Models\Customer;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersIndex extends Component {

  use WithPagination;

  private $customers;

  #[Title('Clientes')]
  public function render() {
    $this->customers = Customer::paginate(15);

    if ($this->customers->currentPage() > $this->customers->lastPage()) {
      $this->resetPage();
      $this->render();
    }

    return view('livewire.indexes.customers-index')->with([
      'customers' => $this->customers,
    ]);
  }
}
