<div class="ui container very padded horizontally fitted basic segment">
  <h1 class="ui header">
    <div class="content">Buques</div>
  </h1>

  <div class="two ui buttons">
    <div wire:click="$dispatch('open-modal', { modal: 'create-ship' })" class="ui fluid secondary button"><i class="plus icon"></i>Añadir buque</div>
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
        <th>Naviera</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($ships as $ship)
        <tr wire:key="{{ $ship->id }}">
          <td>{{ $ship->name }}</td>
          <td>{{ $ship->shippingLine->name }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    @if($ships->isEmpty())
      <div class="ui placeholder segment">
        <div class="ui icon header">
          <i class="ghost icon"></i>Aún no hay elementos que mostrar.
        </div>
      </div>
    @endif
  </div>

  <livewire:store.create-ship @show-message="$refresh"/>

  <div class="ui fitted basic segment">
    {{ $ships->links('vendor.livewire.fomantic') }}
  </div>
</div>