<?php

namespace App\Livewire\Indexes;

use App\Models\Terminal;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class TerminalsIndex extends Component {

  use WithPagination;

  private $terminals;

  #[Title('Terminales')]
  public function render() {
    $this->terminals = Terminal::paginate(15);

    if ($this->terminals->currentPage() > $this->terminals->lastPage()) {
      $this->resetPage();
      $this->render();
    }

    return view('livewire.indexes.terminals-index')->with([
      'terminals' => $this->terminals,
    ]);
  }
}
