<div class="ui container very padded horizontally fitted basic segment">
  <h1 class="ui header">
    <div class="content">Importaciones</div>
  </h1>

  <div class="ui form">
    <div class="fields">
      <div class="six wide field">
        <div class="ui icon input" wire:loading.class="loading">
          <input type="text" name="search" id="search" placeholder="Buscar por referencia" wire:model.live.debounce.250="search" maxlength="70" autocomplete="off" autofocus>
          @if(!$search)
            <i wire:click="$refresh" class="circular sync alternate link icon"></i>
          @else
            <i wire:click="$set('search', '')" class="circular times link icon"></i>
          @endif
        </div>
      </div>
      <div class="field">
        <div wire:click="$dispatch('open-modal', { modal: 'create-import' })" class="ui fluid teal button"><i class="plus icon"></i>Añadir importación</div>
      </div>
    </div>
  </div>

  <div class="ui fitted horizontally basic segment">
    <div class="ui inverted dimmer" wire:loading.class="active">
      <div class="ui text loader">Cargando</div>
    </div>
    <div class="ui three stackable doubling cards">
      @foreach($imports as $import)
        <div wire:key="{{ $import->id }}" class="card">
          <div class="content">
            <div class="ui right floated black label">{{ $import->status == 1 ? 'Alta' : ($import->status == 2 ? 'Esperando zarpar' : ($import->status == 3 ? 'En camino' : ($import->status == 4 ? 'En atraque' : ($import->status == 5 ? 'Descargando' : 'Descargada')))) }}</div>
            <div class="header"><i class="receipt icon"></i>Folio {{ $import->reference }}</div>
            <div class="meta"></div>
            <div class="description">
              <div class="ui list">
                <div class="item">
                  <i class="hard hat icon"></i>
                  <div class="content">Operador: {{ $import->operator->name }}</div>
                </div>
                <div class="item">
                  <i class="hand holding usd icon"></i>
                  <div class="content">Cliente: {{ $import->billLanding->customer->name }}</div>
                </div>
                <div class="item">
                  <i class="file invoice dollar icon"></i>
                  <div class="content">Referencia BL: {{ $import->billLanding->reference }}</div>
                </div>
                <div class="item">
                  <i class="book icon"></i>
                  <div class="content">N° Booking: {{ $import->booking->number }}</div>
                </div>
                <div class="item">
                  <i class="box icon"></i>
                  <div class="content">Mercancía: {{ $import->booking->shipment->name }}</div>
                </div>
                <div class="item">
                  <i class="city icon"></i>
                  <div class="content">Proveedor: {{ $import->booking->shipment->provider->name }}</div>
                </div>
                <div class="item">
                  <i class="shipping icon"></i>
                  <div class="content">Flete: {{ $import->shipping->fee }}</div>
                </div>
                @if($import->surcharge)
                  <div class="item">
                    <i class="money bill icon"></i>
                    <div class="content">Recargos: {{ $import->surcharge->cost }}</div>
                  </div>
                @endif
              </div>
            </div>
          </div>
          <div class="extra content">
            <div class="ui right floated" >
              Llega a {{ $import->destiny->name }} <br>
              en {{ $import->arrive_date->toDateString() }}
            </div>
            <span>
              Zarpó de {{ $import->origin->name }}
              <br>
              en {{ $import->sail_date->toDateString() }}
            </span>
          </div>
          <div class="ui tiny bottom attached buttons">
            <div wire:click="forwardStatus({{ $import }})" class="ui {{ $import->status < 6 ?: 'disabled' }} teal button"><i class="step forward icon"></i>Adelantar estatus</div>
          </div>
        </div>
      @endforeach
    </div>
    @if($imports->isEmpty())
      <div class="ui placeholder segment">
        <div class="ui icon header">
          <i class="{{ $search ? 'search' : 'ghost' }} icon"></i>
          {{ $search ? 'No hay coincidencias de búsqueda.' : 'Aún no hay elementos que mostrar.' }}
        </div>
        @if ($search)
          <section class="ui center aligned container inline">
            <div class="ui secondary button" wire:click="$set('search', '')"><i class="times icon"></i>Limpiar búsqueda</div>
          </section>
        @endif
      </div>
    @endif
  </div>

  <livewire:store.create-import @show-message="$refresh"/>

  <div class="ui fitted basic segment">
    {{ $imports->links('vendor.livewire.fomantic') }}
  </div>
</div>