<?php

namespace App\Livewire\Indexes;

use App\Models\BillLanding;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class BillsIndex extends Component {

  use WithPagination;

  private $bills;

  #[Title('Bills of Landing')]
  public function render() {
    $this->bills = BillLanding::paginate(15);

    if ($this->bills->currentPage() > $this->bills->lastPage()) {
      $this->resetPage();
      $this->render();
    }

    return view('livewire.indexes.bills-index')->with([
      'bills' => $this->bills,
    ]);
  }
}
