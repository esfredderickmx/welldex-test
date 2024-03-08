<div>
  @teleport('body')
  <div class="ui tiny modal" modal="create-import" wire:ignore.self>
    <div class="ui top attached teal inverted segment">
      <div class="ui large header">Añadir importación</div>
    </div>
    <div class="ui attached segment content">
      <form id="storeImport" class="ui form" wire:submit="storeImport" wire:loading.class="loading" wire:target="storeImport">
        <div class="field required @error('operator') error @enderror">
          <label for="operator">Operador asociado</label>
          <div class="ui input" wire:ignore>
            <select name="operator" id="operator" class="ui fluid floating search selection dropdown" wire:model.live="operator" autofocus>
              <option value="">Operador asociado</option>
              @foreach(\App\Models\Operator::query()->orderBy('name')->get() as $operator)
                <option value="{{ $operator->id }}">{{ $operator->name }}</option>
              @endforeach
            </select>
          </div>
          @error('operator')
          <span class="ui small error text">{{ $message }}</span>
          @enderror
        </div>
        <div class="two fields">
          <div class="field required @error('bill') error @enderror">
            <label for="bill">BL asociado</label>
            <div class="ui input" wire:ignore>
              <select name="bill" id="bill" class="ui fluid floating search selection dropdown" wire:model.live="bill">
                <option value="">BL asociado</option>
                @foreach(\App\Models\BillLanding::query()->orderBy('reference')->get() as $bill)
                  <option value="{{ $bill->id }}">{{ $bill->reference }}</option>
                @endforeach
              </select>
            </div>
            @error('bill')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
          <div class="field required @error('booking') error @enderror">
            <label for="booking">Booking asociado</label>
            <div class="ui input" wire:ignore>
              <select name="booking" id="booking" class="ui fluid floating search selection dropdown" wire:model.live="booking">
                <option value="">Booking asociado</option>
                @foreach(\App\Models\Booking::query()->orderBy('number')->get() as $booking)
                  <option value="{{ $booking->id }}">{{ $booking->number }}</option>
                @endforeach
              </select>
            </div>
            @error('booking')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="two fields">
          <div class="field required @error('origin_terminal') error @enderror">
            <label for="origin_terminal">Terminal de origen</label>
            <div class="ui input" wire:ignore>
              <select name="origin_terminal" id="origin_terminal" class="ui fluid floating search selection dropdown" wire:model.live="origin_terminal">
                <option value="">Terminal de origen</option>
                @foreach(\App\Models\Terminal::query()->orderBy('name')->get() as $terminal)
                  <option value="{{ $terminal->id }}">{{ $terminal->name }}</option>
                @endforeach
              </select>
            </div>
            @error('origin_terminal')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
          <div class="field required @error('destiny_terminal') error @enderror">
            <label for="destiny_terminal">Terminal de arribo</label>
            <div class="ui input" wire:ignore>
              <select name="destiny_terminal" id="destiny_terminal" class="ui fluid floating search selection dropdown" wire:model.live="destiny_terminal">
                <option value="">Terminal de arribo</option>
                @foreach(\App\Models\Terminal::query()->orderBy('name')->get() as $terminal)
                  <option value="{{ $terminal->id }}">{{ $terminal->name }}</option>
                @endforeach
              </select>
            </div>
            @error('destiny_terminal')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="field required @error('reference') error @enderror">
          <label for="reference">Referencia</label>
          <div class="ui left icon input">
            <input type="number" name="reference" id="reference" placeholder="Referencia" wire:model.blur="reference" autocomplete="off">
            <i class="barcode icon"></i>
          </div>
          @error('reference')
          <span class="ui small error text">{{ $message }}</span>
          @enderror
        </div>
        <div class="two fields">
          <div class="field required @error('sail_date') error @enderror">
            <label for="sail_date">Fecha de zarpe</label>
            <div class="ui left icon input">
              <input type="date" name="sail_date" id="sail_date" placeholder="Fecha de zarpe" wire:model.blur="sail_date" autocomplete="off">
              <i class="calendar alternate outline icon"></i>
            </div>
            @error('sail_date')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
          <div class="field required @error('arrive_date') error @enderror">
            <label for="arrive_date">Fecha de arribo</label>
            <div class="ui left icon input">
              <input type="date" name="arrive_date" id="arrive_date" placeholder="Fecha de arribo" wire:model.blur="arrive_date" autocomplete="off">
              <i class="calendar alternate icon"></i>
            </div>
            @error('arrive_date')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="two fields">
          <div class="field required @error('fee') error @enderror">
            <label for="fee">Costo del flete</label>
            <div class="ui left icon input">
              <input type="number" name="fee" id="fee" placeholder="Costo del flete" wire:model.blur="fee" autocomplete="off">
              <i class="dollar sign icon"></i>
            </div>
            @error('fee')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
          <div class="field required @error('payment_method') error @enderror">
            <label for="payment_method">Método de pago</label>
            <div class="ui input" wire:ignore>
              <select name="payment_method" id="payment_method" class="ui fluid floating selection dropdown" wire:model.live="payment_method">
                <option value="">Método de pago</option>
                <option value="chas">Efectivo</option>
                <option value="credit">Crédito</option>
                <option value="debit">Débito</option>
              </select>
            </div>
            @error('payment_method')
            <span class="ui small error text">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="field">
          <div class="ui checkbox" wire:ignore>
            <input type="checkbox" name="surcharge" id="surcharge" wire:model.live="surcharge">
            <label for="surcharge">Incluir recargos</label>
          </div>
        </div>
        @if($surcharge)
          <div wire:transition class="two fields">
            <div class="field required @error('cost') error @enderror">
              <label for="cost">Recargos</label>
              <div class="ui left icon input">
                <input type="number" name="cost" id="cost" placeholder="Recargos" wire:model.blur="cost" autocomplete="off">
                <i class="dollar sign icon"></i>
              </div>
              @error('cost')
              <span class="ui small error text">{{ $message }}</span>
              @enderror
            </div>
            <div class="field required @error('concept') error @enderror">
              <label for="concept">Concepto</label>
              <div class="ui left icon input">
                <input type="text" name="concept" id="concept" placeholder="Concepto" maxlength="50" wire:model.blur="concept" autocomplete="off">
                <i class="quote left icon"></i>
              </div>
              @error('concept')
              <span class="ui small error text">{{ $message }}</span>
              @enderror
            </div>
          </div>
        @endif
      </form>
      @error('form')
      <div wire:transition class="ui error message">{{ $message }}</div>
      @enderror
    </div>
    <div class="ui bottom attached segment actions">
      <button form="storeImport" type="submit" class="ui labeled icon teal button" wire:loading.class="disabled" wire:target="storeImport">
        <i class="check icon" wire:loading.class="loading spinner" wire:target="storeImport"></i>Añadir importación
      </button>
      <button wire:click="resetForm" form="storeImport" type="reset" class="ui cancel button" wire:loading.class="loading" wire:target="resetForm">Cancelar</button>
    </div>
  </div>
  @endteleport
</div>