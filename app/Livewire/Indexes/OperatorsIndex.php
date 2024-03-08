<?php

namespace App\Livewire\Indexes;

use App\Models\Operator;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class OperatorsIndex extends Component {

  use WithPagination;

  private $operators;

  #[Title('Operadores')]
  public function render() {
    $this->operators = Operator::paginate(15);

    if ($this->operators->currentPage() > $this->operators->lastPage()) {
      $this->resetPage();
      $this->render();
    }

    return view('livewire.indexes.operators-index')->with([
      'operators' => $this->operators,
    ]);
  }
}
