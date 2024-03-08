<?php

namespace App\Livewire\Indexes;

use App\Models\Ship;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ShipsIndex extends Component {

  use WithPagination;

  private $ships;

  #[Title('Buques')]
  public function render() {
    $this->ships = Ship::paginate(15);

    if ($this->ships->currentPage() > $this->ships->lastPage()) {
      $this->resetPage();
      $this->render();
    }

    return view('livewire.indexes.ships-index')->with([
      'ships' => $this->ships,
    ]);
  }
}
