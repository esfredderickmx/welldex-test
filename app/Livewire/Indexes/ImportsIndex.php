<?php

namespace App\Livewire\Indexes;

use App\Models\Import;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ImportsIndex extends Component {

  use WithPagination;

  private $imports;
  public $search;

  #[Title('Importaciones')]
  public function render() {
    $query = $this->imports = Import::query();

    if ($this->search) {
      $query->where('reference', 'like', "%$this->search");
    }

    $query->count() !== 0 ?: $this->resetPage();

    $this->imports = $query->paginate(15);

    if ($this->imports->currentPage() > $this->imports->lastPage()) {
      $this->resetPage();
      $this->render();
    }

    return view('livewire.indexes.imports-index')->with([
      'imports' => $this->imports,
    ]);
  }

  public function forwardStatus(Import $import) {
    $import->status >= 6 || Import::find($import->id)->update([
      'status' => $import->status + 1
    ]);
  }
}
