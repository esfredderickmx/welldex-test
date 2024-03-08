<?php

namespace App\Livewire\Indexes;

use App\Models\ShippingLine;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class LinesIndex extends Component {

  use WithPagination;

  private $lines;

  #[Title('Navieras')]
  public function render() {
    $this->lines = ShippingLine::paginate(15);

    if ($this->lines->currentPage() > $this->lines->lastPage()) {
      $this->resetPage();
      $this->render();
    }

    return view('livewire.indexes.lines-index')->with([
      'lines' => $this->lines,
    ]);
  }
}
