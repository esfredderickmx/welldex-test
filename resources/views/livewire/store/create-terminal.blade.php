<div>
  @teleport('body')
  <div class="ui tiny modal" modal="create-terminal" wire:ignore.self>
    <div class="ui top attached blue inverted segment">
      <div class="ui large header">Añadir terminal</div>
    </div>
    <div class="ui attached segment content">
      <form id="storeTerminal" class="ui form" wire:submit="storeTerminal" wire:loading.class="loading" wire:target="storeTerminal">
        <div class="two fields">
          <div class="field required @error('name') error @enderror">
            <label for="name">Nombre</label>
            <div class="ui left icon input">
              <input type="text" name="name" id="name" placeholder="Nombre" wire:model.blur="name" maxlength="80" autocomplete="off" autofocus>
              <i class="quote left icon"></i>
            </div>
            @error('name')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
          <div class="field required @error('phone_number') error @enderror">
            <label for="phone_number">Número de teléfono</label>
            <div class="ui left icon input">
              <input type="tel" name="phone_number" id="phone_number" placeholder="Número de teléfono" wire:model.blur="phone_number" maxlength="10" autocomplete="off">
              <i class="phone alternate icon"></i>
            </div>
            @error('phone_number')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="two fields">
          <div class="field required @error('country') error @enderror">
            <label for="country">País</label>
            <div class="ui left icon input">
              <input type="text" name="country" id="country" placeholder="País" wire:model.blur="country" maxlength="50" autocomplete="off">
              <i class="globe icon"></i>
            </div>
            @error('country')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
          <div class="field required @error('state') error @enderror">
            <label for="state">Estado</label>
            <div class="ui left icon input">
              <input type="text" name="state" id="state" placeholder="Estado" wire:model.blur="state" maxlength="50" autocomplete="off">
              <i class="map marker icon"></i>
            </div>
            @error('state')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="two fields">
          <div class="six wide field required @error('zip') error @enderror">
            <label for="zip">C.P.</label>
            <div class="ui left icon input">
              <input type="number" name="zip" id="zip" placeholder="C.P." wire:model.blur="zip" autocomplete="off">
              <i class="tag icon"></i>
            </div>
            @error('zip')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
          <div class="ten wide field required @error('division') error @enderror">
            <label for="division">Ciudad/Municipio/Localidad</label>
            <div class="ui left icon input">
              <input type="text" name="division" id="division" placeholder="Ciudad/Municipio/Localidad" wire:model.blur="division" maxlength="50" autocomplete="off">
              <i class="map marker alternate icon"></i>
            </div>
            @error('division')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="two fields">
          <div class="ten wide field required @error('street') error @enderror">
            <label for="street">Calle</label>
            <div class="ui left icon input">
              <input type="text" name="street" id="street" placeholder="Calle" wire:model.blur="street" maxlength="50" autocomplete="off">
              <i class="map pin icon"></i>
            </div>
            @error('street')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
          <div class="six wide field @error('number') error @enderror">
            <label for="number">Número</label>
            <div class="ui left icon input">
              <input type="number" name="number" id="number" placeholder="Número" wire:model.blur="number" autocomplete="off">
              <i class="hashtag icon"></i>
            </div>
            @error('number')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </form>
      @error('form')
      <div wire:transition class="ui error message">{{ $message }}</div>
      @enderror
    </div>
    <div class="ui bottom attached segment actions">
      <button form="storeTerminal" type="submit" class="ui labeled icon primary button" wire:loading.class="disabled" wire:target="storeTerminal">
        <i class="check icon" wire:loading.class="loading spinner" wire:target="storeTerminal"></i>Añadir terminal
      </button>
      <button wire:click="resetForm" form="storeTerminal" type="reset" class="ui cancel button" wire:loading.class="loading" wire:target="resetForm">Cancelar</button>
    </div>
  </div>
  @endteleport
</div>