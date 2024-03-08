<div class="ui container very padded horizontally fitted basic segment">
  <h1 class="ui header">
    <div class="content">Bookings</div>
  </h1>

  <div wire:click="$dispatch('open-modal', { modal: 'create-booking' })" class="ui fluid grey button"><i class="plus icon"></i>Añadir booking</div>

  <div class="ui fitted basic segment">
    <div class="ui inverted dimmer" wire:loading.class="active">
      <div class="ui text loader">Cargando</div>
    </div>
    <table class="ui compact celled table">
      <thead class="full-width">
      <tr>
        <th>Número</th>
        <th>Buque</th>
        <th>Mercancía</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($bookings as $booking)
        <tr wire:key="{{ $booking->id }}">
          <td>{{ $booking->number }}</td>
          <td>{{ $booking->ship->name }}</td>
          <td>{{ $booking->shipment->name }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    @if($bookings->isEmpty())
      <div class="ui placeholder segment">
        <div class="ui icon header">
          <i class="ghost icon"></i>Aún no hay elementos que mostrar.
        </div>
      </div>
    @endif
  </div>

  <livewire:store.create-booking @show-message="$refresh"/>

  <div class="ui fitted basic segment">
    {{ $bookings->links('vendor.livewire.fomantic') }}
  </div>
</div>