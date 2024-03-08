<?php

namespace App\Livewire\Indexes;

use App\Models\Provider;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ProvidersIndex extends Component {

  use WithPagination;

  private $providers;

  #[Title('Proveedores')]
  public function render() {
    $this->providers = Provider::paginate(15);

    if ($this->providers->currentPage() > $this->providers->lastPage()) {
      $this->resetPage();
      $this->render();
    }

    return view('livewire.indexes.providers-index')->with([
      'providers' => $this->providers,
    ]);
  }
}
