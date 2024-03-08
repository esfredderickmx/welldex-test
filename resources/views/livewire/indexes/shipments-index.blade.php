<div class="ui container very padded horizontally fitted basic segment">
  <h1 class="ui header">
    <div class="content">Mercancías</div>
  </h1>

  <div class="two ui buttons">
    <div wire:click="$dispatch('open-modal', { modal: 'create-shipment' })" class="ui fluid secondary button"><i class="plus icon"></i>Añadir mercancía</div>
    <a href="{{ route('index-bookings') }}" class="ui grey button"><i class="book icon"></i>Gestionar bookings</a>
  </div>

  <div class="ui fitted basic segment">
    <div class="ui inverted dimmer" wire:loading.class="active">
      <div class="ui text loader">Cargando</div>
    </div>
    <table class="ui compact celled table">
      <thead class="full-width">
      <tr>
        <th>Nombre</th>
        <th>Proveedor</th>
        <th>Descripción</th>
        <th>Origen</th>
        <th>Destino</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($shipments as $shipment)
        <tr wire:key="{{ $shipment->id }}">
          <td>{{ $shipment->name }}</td>
          <td>{{ $shipment->provider->name }}</td>
          <td>Peso bruto: {{ $shipment->description->gross_weight }} Kg. Volumen: {{ $shipment->description->size }} L. Unidades: {{ $shipment->description->items }}. Dimensiones: {{ $shipment->description->dimensions }}. Marca: {{ $shipment->description->brand }}. Embalaje: {{ $shipment->description->type === 'packages' ? 'Bultos/cajas' : 'Carga suelta' }}.</td>
          <td>{{ $shipment->originAddress->state . ', ' . $shipment->originAddress->country }}</td>
          <td>{{ $shipment->destinyAddress->state . ', ' . $shipment->destinyAddress->country }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    @if($shipments->isEmpty())
      <div class="ui placeholder segment">
        <div class="ui icon header">
          <i class="ghost icon"></i>Aún no hay elementos que mostrar.
        </div>
      </div>
    @endif
  </div>

  <livewire:store.create-shipment @show-message="$refresh"/>

  <div class="ui fitted basic segment">
    {{ $shipments->links('vendor.livewire.fomantic') }}
  </div>
</div>