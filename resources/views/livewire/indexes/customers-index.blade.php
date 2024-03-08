<div class="ui container very padded horizontally fitted basic segment">
  <h1 class="ui header">
    <div class="content">Clientes</div>
  </h1>

  <div class="two ui buttons">
    <div wire:click="$dispatch('open-modal', { modal: 'create-customer' })" class="ui fluid primary button"><i class="plus icon"></i>Añadir cliente</div>
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
        <th>Tipo</th>
        <th>Dirección</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($customers as $customer)
        <tr wire:key="{{ $customer->id }}">
          <td>{{ $customer->name }}</td>
          <td>{{ $customer->phone_number }}</td>
          <td>{{ $customer->type === 'person' ? 'Individuo' : 'Empresa' }}</td>
          <td>{{ $customer->address->state . ', ' . $customer->address->country }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    @if($customers->isEmpty())
      <div class="ui placeholder segment">
        <div class="ui icon header">
          <i class="ghost icon"></i>Aún no hay elementos que mostrar.
        </div>
      </div>
    @endif
  </div>

  <livewire:store.create-customer @show-message="$refresh"/>

  <div class="ui fitted basic segment">
    {{ $customers->links('vendor.livewire.fomantic') }}
  </div>
</div>