<div class="ui container very padded horizontally fitted basic segment">
  <h1 class="ui header">
    <div class="content">Navieras</div>
  </h1>

  <div class="three ui buttons">
    <div wire:click="$dispatch('open-modal', { modal: 'create-line' })" class="ui fluid primary button"><i class="plus icon"></i>Añadir naviera</div>
    <a href="{{ route('index-ships') }}" class="ui secondary button"><i class="ship icon"></i>Gestionar buques</a>
    <a href="{{ route('index-bills') }}" class="ui grey button"><i class="file icon"></i>Gestionar BLs</a>
  </div>

  <div class="ui fitted basic segment">
    <div class="ui inverted dimmer" wire:loading.class="active">
      <div class="ui text loader">Cargando</div>
    </div>
    <table class="ui compact celled table">
      <thead class="full-width">
      <tr>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Dirección</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($lines as $line)
        <tr wire:key="{{ $line->id }}">
          <td>{{ $line->name }}</td>
          <td>{{ $line->phone_number }}</td>
          <td>{{ $line->address->state . ', ' . $line->address->country }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    @if($lines->isEmpty())
      <div class="ui placeholder segment">
        <div class="ui icon header">
          <i class="ghost icon"></i>Aún no hay elementos que mostrar.
        </div>
      </div>
    @endif
  </div>

  <livewire:store.create-line @show-message="$refresh"/>

  <div class="ui fitted basic segment">
    {{ $lines->links('vendor.livewire.fomantic') }}
  </div>
</div>