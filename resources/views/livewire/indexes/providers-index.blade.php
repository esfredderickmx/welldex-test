<div class="ui container very padded horizontally fitted basic segment">
  <h1 class="ui header">
    <div class="content">Proveedores</div>
  </h1>

  <div class="two ui buttons">
    <div wire:click="$dispatch('open-modal', { modal: 'create-provider' })" class="ui primary button"><i class="plus icon"></i>Añadir proveedor</div>
    <a href="{{ route('index-shipments') }}" class="ui secondary button"><i class="box icon"></i>Gestionar mercancías</a>
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
      @foreach ($providers as $provider)
        <tr wire:key="{{ $provider->id }}">
          <td>{{ $provider->name }}</td>
          <td>{{ $provider->phone_number }}</td>
          <td>{{ $provider->address->state . ', ' . $provider->address->country }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    @if($providers->isEmpty())
      <div class="ui placeholder segment">
        <div class="ui icon header">
          <i class="ghost icon"></i>Aún no hay elementos que mostrar.
        </div>
      </div>
    @endif
  </div>

  <livewire:store.create-provider @show-message="$refresh"/>

  <div class="ui fitted basic segment">
    {{ $providers->links('vendor.livewire.fomantic') }}
  </div>
</div>