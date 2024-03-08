<div>
  @teleport('body')
  <div class="ui tiny modal" modal="create-booking" wire:ignore.self>
    <div class="ui top attached grey inverted segment">
      <div class="ui large header">Añadir booking</div>
    </div>
    <div class="ui attached segment content">
      <form id="storeBooking" class="ui form" wire:submit="storeBooking" wire:loading.class="loading" wire:target="storeBooking">
        <div class="field required @error('ship') error @enderror">
          <label for="ship">Buque asociado</label>
          <div class="ui input" wire:ignore>
            <select name="ship" id="ship" class="ui fluid floating search selection dropdown" wire:model.live="ship" autofocus>
              <option value="">Buque asociado</option>
              @foreach(\App\Models\Ship::query()->orderBy('name')->get() as $ship)
                <option value="{{ $ship->id }}">{{ $ship->name }}</option>
              @endforeach
            </select>
          </div>
          @error('ship')
          <span class="ui small error text">{{ $message }}</span>
          @enderror
        </div>
        <div class="field required @error('shipment') error @enderror">
          <label for="shipment">Mercancía asociada</label>
          <div class="ui input" wire:ignore>
            <select name="shipment" id="shipment" class="ui fluid floating search selection dropdown" wire:model.live="shipment">
              <option value="">Mercancía asociada</option>
              @foreach(\App\Models\Shipment::query()->orderBy('name')->get() as $shipment)
                <option value="{{ $shipment->id }}">{{ $shipment->name }}</option>
              @endforeach
            </select>
          </div>
          @error('shipment')
          <span class="ui small error text">{{ $message }}</span>
          @enderror
        </div>
        <div class="field required @error('number') error @enderror">
          <label for="number">Número</label>
          <div class="ui left icon input">
            <input type="number" name="number" id="number" placeholder="Número" wire:model.blur="number" autocomplete="off">
            <i class="barcode icon"></i>
          </div>
          @error('number')
          <span class="ui small error text">{{ $message }}</span>
          @enderror
        </div>
      </form>
      @error('form')
      <div wire:transition class="ui error message">{{ $message }}</div>
      @enderror
    </div>
    <div class="ui bottom attached segment actions">
      <button form="storeBooking" type="submit" class="ui labeled icon grey button" wire:loading.class="disabled" wire:target="storeBooking">
        <i class="check icon" wire:loading.class="loading spinner" wire:target="storeBooking"></i>Añadir booking
      </button>
      <button wire:click="resetForm" form="storeBooking" type="reset" class="ui cancel button" wire:loading.class="loading" wire:target="resetForm">Cancelar</button>
    </div>
  </div>
  @endteleport
</div>