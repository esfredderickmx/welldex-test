<div>
  @teleport('body')
  <div class="ui tiny modal" modal="create-bill" wire:ignore.self>
    <div class="ui top attached grey inverted segment">
      <div class="ui large header">Añadir BL</div>
    </div>
    <div class="ui attached segment content">
      <form id="storeBill" class="ui form" wire:submit="storeBill" wire:loading.class="loading" wire:target="storeBill">
        <div class="field required @error('customer') error @enderror">
          <label for="customer">Cliente asociado</label>
          <div class="ui input" wire:ignore>
            <select name="customer" id="customer" class="ui fluid floating search selection dropdown" wire:model.live="customer" autofocus>
              <option value="">Cliente asociado</option>
              @foreach(\App\Models\Customer::query()->orderBy('name')->get() as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
              @endforeach
            </select>
          </div>
          @error('customer')
          <span class="ui small error text">{{ $message }}</span>
          @enderror
        </div>
        <div class="field required @error('shipping_line') error @enderror">
          <label for="shipping_line">Naviera asociada</label>
          <div class="ui input" wire:ignore>
            <select name="shipping_line" id="shipping_line" class="ui fluid floating search selection dropdown" wire:model.live="shipping_line">
              <option value="">Naviera asociada</option>
              @foreach(\App\Models\ShippingLine::query()->orderBy('name')->get() as $line)
                <option value="{{ $line->id }}">{{ $line->name }}</option>
              @endforeach
            </select>
          </div>
          @error('shipping_line')
          <span class="ui small error text">{{ $message }}</span>
          @enderror
        </div>
        <div class="field required @error('reference') error @enderror">
          <label for="reference">Referencia</label>
          <div class="ui left icon input">
            <input type="tel" name="reference" id="reference" placeholder="Referencia" wire:model.blur="reference" maxlength="10" autocomplete="off">
            <i class="barcode icon"></i>
          </div>
          @error('reference')
          <span class="ui small error text">{{ $message }}</span>
          @enderror
        </div>
      </form>
      @error('form')
      <div wire:transition class="ui error message">{{ $message }}</div>
      @enderror
    </div>
    <div class="ui bottom attached segment actions">
      <button form="storeBill" type="submit" class="ui labeled icon grey button" wire:loading.class="disabled" wire:target="storeBill">
        <i class="check icon" wire:loading.class="loading spinner" wire:target="storeBill"></i>Añadir BL
      </button>
      <button wire:click="resetForm" form="storeBill" type="reset" class="ui cancel button" wire:loading.class="loading" wire:target="resetForm">Cancelar</button>
    </div>
  </div>
  @endteleport
</div>