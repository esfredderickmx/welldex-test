<?php

namespace App\Livewire\Indexes;

use App\Models\Shipment;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ShipmentsIndex extends Component {

  use WithPagination;

  private $shipments;

  #[Title('Mercancías')]
  public function render() {
    $this->shipments = Shipment::paginate(15);

    if ($this->shipments->currentPage() > $this->shipments->lastPage()) {
      $this->resetPage();
      $this->render();
    }

    return view('livewire.indexes.shipments-index')->with([
      'shipments' => $this->shipments,
    ]);
  }
}
