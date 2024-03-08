<?php

namespace App\Livewire\Store;

use App\Models\BillLanding;
use App\Models\Booking;
use App\Models\Import;
use App\Models\Operator;
use App\Models\Shipping;
use App\Models\Surcharge;
use App\Models\Terminal;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateImport extends Component {

  #[Validate('exists:operators,id')]
  public $operator;
  #[Validate('exists:bill_landings,id')]
  public $bill;
  #[Validate('exists:bookings,id')]
  public $booking;
  #[Validate('exists:terminals,id')]
  public $origin_terminal;
  #[Validate('exists:terminals,id|different:origin_terminal')]
  public $destiny_terminal;
  #[Validate('required|numeric|max_digits:12|unique:imports,reference')]
  public $reference;
  #[Validate('required|date|before:arrive_date')]
  public $sail_date;
  #[Validate('required|date|after:sail_date')]
  public $arrive_date;
  #[Validate('required|numeric')]
  public $fee;
  #[Validate]
  public $payment_method;
  public $surcharge = false;
  public $cost;
  public $concept;

  protected function rules() {
    return [
      'payment_method' => [
        'required',
        Rule::in(['cash', 'credit', 'debit'])
      ],
      'cost' => [
        Rule::requiredIf($this->surcharge === true),
        'max_digits:8'
      ],
      'concept' => [
        Rule::requiredIf($this->surcharge === true),
        'max:50'
      ]
    ];
  }

  public function render() {
    return view('livewire.store.create-import');
  }

  public function storeImport() {
    $this->validate();

    $created_import = Import::create($this->all());
    $created_import->operator()->associate(Operator::find($this->operator))->save();
    $created_import->billLanding()->associate(BillLanding::find($this->bill))->save();
    $created_import->booking()->associate(Booking::find($this->booking))->save();
    $created_import->origin()->associate(Terminal::find($this->origin_terminal))->save();
    $created_import->destiny()->associate(Terminal::find($this->destiny_terminal))->save();
    $created_import->shipping()->save(Shipping::create($this->all()));
    !$this->surcharge ?: $created_import->surcharge()->save(Surcharge::create($this->all()));

    $this->resetForm();

    $this->dispatch('show-message', message: 'Importación añadida correctamente.', type: 'success', modal: 'create-import');
  }

  public function resetForm() {
    $this->reset();
    $this->resetErrorBag();

    $this->dispatch('reset-modal-selection', modal: 'create-import');
  }
}
