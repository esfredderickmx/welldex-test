<?php

namespace App\Livewire\Store;

use App\Models\BillLanding;
use App\Models\Customer;
use App\Models\ShippingLine;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateBill extends Component {

  #[Validate('exists:customers,id')]
  public $customer;
  #[Validate('exists:shipping_lines,id')]
  public $shipping_line;
  #[Validate('required|string|size:10|unique:bill_landings,reference')]
  public $reference;

  public function render() {
    return view('livewire.store.create-bill');
  }

  public function storeBill() {
    $this->validate();

    $created_bill = BillLanding::create($this->all());
    $created_bill->customer()->associate(Customer::find($this->customer))->save();
    $created_bill->shippingLine()->associate(ShippingLine::find($this->shipping_line))->save();

    $this->resetForm();

    $this->dispatch('show-message', message: 'BL añadido correctamente.', type: 'success', modal: 'create-bill');
  }

  public function resetForm() {
    $this->reset();
    $this->resetErrorBag();

    $this->dispatch('reset-modal-selection', modal: 'create-bill');
  }
}
