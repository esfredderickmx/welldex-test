<div>
  @teleport('body')
  <div class="ui tiny modal" modal="create-ship" wire:ignore.self>
    <div class="ui top attached black inverted segment">
      <div class="ui large header">Añadir buque</div>
    </div>
    <div class="ui attached segment content">
      <form id="storeShip" class="ui form" wire:submit="storeShip" wire:loading.class="loading" wire:target="storeShip">
        <div class="field required @error('shipping_line') error @enderror">
          <label for="shipping_line">Naviera asociada</label>
          <div class="ui input" wire:ignore>
            <select name="shipping_line" id="shipping_line" class="ui fluid floating search selection dropdown" wire:model.live="shipping_line" autofocus>
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
        <div class="field required @error('name') error @enderror">
          <label for="name">Nombre</label>
          <div class="ui left icon input">
            <input type="text" name="name" id="name" placeholder="Nombre" wire:model.blur="name" maxlength="80" autocomplete="off">
            <i class="quote left icon"></i>
          </div>
          @error('name')
          <span class="ui small error text">{{ $message }}</span>
          @enderror
        </div>
      </form>
      @error('form')
      <div wire:transition class="ui error message">{{ $message }}</div>
      @enderror
    </div>
    <div class="ui bottom attached segment actions">
      <button form="storeShip" type="submit" class="ui labeled icon secondary button" wire:loading.class="disabled" wire:target="storeShip">
        <i class="check icon" wire:loading.class="loading spinner" wire:target="storeShip"></i>Añadir buque
      </button>
      <button wire:click="resetForm" form="storeShip" type="reset" class="ui cancel button" wire:loading.class="loading" wire:target="resetForm">Cancelar</button>
    </div>
  </div>
  @endteleport
</div>