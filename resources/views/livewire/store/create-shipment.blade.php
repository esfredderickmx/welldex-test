<div>
  @teleport('body')
  <div class="ui tiny modal" modal="create-shipment" wire:ignore.self>
    <div class="ui top attached black inverted segment">
      <div class="ui large header">Añadir mercancía</div>
    </div>
    <div class="ui attached segment content">
      <form id="storeShipment" class="ui form" wire:submit="storeShipment" wire:loading.class="loading" wire:target="storeShipment">
        <div class="field required @error('provider') error @enderror">
          <label for="provider">Proveedor asociado</label>
          <div class="ui input" wire:ignore>
            <select name="provider" id="provider" class="ui fluid floating search selection dropdown" wire:model.live="provider" autofocus>
              <option value="">Proveedor asociado</option>
              @foreach(\App\Models\Provider::query()->orderBy('name')->get() as $provider)
                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
              @endforeach
            </select>
          </div>
          @error('provider')
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
        <div class="field required">
          <label for="name">Dirección de origen</label>
          <div class="two fields">
            <div class="field required @error('origin_country') error @enderror">
              <div class="ui left icon input">
                <input type="text" name="origin_country" id="origin_country" placeholder="País" wire:model.blur="origin_country" maxlength="50" autocomplete="off">
                <i class="globe icon"></i>
              </div>
              @error('origin_country')
              <span class="ui small error text">{{ $message }}</span>
              @enderror
            </div>
            <div class="field required @error('origin_state') error @enderror">
              <div class="ui left icon input">
                <input type="text" name="origin_state" id="origin_state" placeholder="Estado" wire:model.blur="origin_state" maxlength="50" autocomplete="off">
                <i class="map marker icon"></i>
              </div>
              @error('origin_state')
              <span class="ui small error text">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="field required">
          <label for="name">Dirección de destino</label>
          <div class="two fields">
            <div class="field required @error('destiny_country') error @enderror">
              <div class="ui left icon input">
                <input type="text" name="destiny_country" id="destiny_country" placeholder="País" wire:model.blur="destiny_country" maxlength="50" autocomplete="off">
                <i class="globe icon"></i>
              </div>
              @error('destiny_country')
              <span class="ui small error text">{{ $message }}</span>
              @enderror
            </div>
            <div class="field required @error('destiny_state') error @enderror">
              <div class="ui left icon input">
                <input type="text" name="destiny_state" id="destiny_state" placeholder="Estado" wire:model.blur="destiny_state" maxlength="50" autocomplete="off">
                <i class="map marker icon"></i>
              </div>
              @error('destiny_state')
              <span class="ui small error text">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="two fields">
          <div class="field required @error('gross_weight') error @enderror">
            <label for="gross_weight">Peso bruto</label>
            <div class="ui left icon input">
              <input type="number" name="gross_weight" id="gross_weight" placeholder="Peso bruto" wire:model.blur="gross_weight" autocomplete="off">
              <i class="dumbbell icon"></i>
            </div>
            @error('gross_weight')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
          <div class="field required @error('size') error @enderror">
            <label for="size">Volumen</label>
            <div class="ui left icon input">
              <input type="number" name="size" id="size" placeholder="Volumen" wire:model.blur="size" autocomplete="off">
              <i class="prescription bottle icon"></i>
            </div>
            @error('size')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="two fields">
          <div class="field required @error('items') error @enderror">
            <label for="items">Unidades</label>
            <div class="ui left icon input">
              <input type="number" name="items" id="items" placeholder="Unidades" wire:model.blur="items" autocomplete="off">
              <i class="th icon"></i>
            </div>
            @error('items')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
          <div class="field required @error('dimensions') error @enderror">
            <label for="dimensions">Dimensiones</label>
            <div class="ui left icon input">
              <input type="text" name="dimensions" id="dimensions" placeholder="Dimensiones" wire:model.blur="dimensions" maxlength="50" autocomplete="off">
              <i class="ruler combined icon"></i>
            </div>
            @error('dimensions')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="two fields">
          <div class="field required @error('brand') error @enderror">
            <label for="brand">Marca</label>
            <div class="ui left icon input">
              <input type="text" name="brand" id="brand" placeholder="Marca" wire:model.blur="brand" maxlength="50" autocomplete="off">
              <i class="copyright icon"></i>
            </div>
            @error('brand')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
          <div class="field required @error('type') error @enderror">
            <label for="type">Tipo de mercancía</label>
            <div class="ui input" wire:ignore>
              <select name="type" id="type" class="ui fluid floating selection dropdown" wire:model.live="type">
                <option value="">Tipo de mercancía</option>
                <option value="packages">Bulto/caja</option>
                <option value="goods">Carga suelta</option>
              </select>
            </div>
            @error('type')
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
      <button form="storeShipment" type="submit" class="ui labeled icon secondary button" wire:loading.class="disabled" wire:target="storeShipment">
        <i class="check icon" wire:loading.class="loading spinner" wire:target="storeShipment"></i>Añadir mercancía
      </button>
      <button wire:click="resetForm" form="storeShipment" type="reset" class="ui cancel button" wire:loading.class="loading" wire:target="resetForm">Cancelar</button>
    </div>
  </div>
  @endteleport
</div>