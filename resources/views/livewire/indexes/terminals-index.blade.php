<div class="ui container very padded horizontally fitted basic segment">
  <h1 class="ui header">
    <div class="content">Terminales</div>
  </h1>

  <div wire:click="$dispatch('open-modal', { modal: 'create-terminal' })" class="ui fluid primary button"><i class="plus icon"></i>Añadir terminal</div>

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
      @foreach ($terminals as $terminal)
        <tr wire:key="{{ $terminal->id }}">
          <td>{{ $terminal->name }}</td>
          <td>{{ $terminal->phone_number }}</td>
          <td>{{ $terminal->address->state . ', ' . $terminal->address->country }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    @if($terminals->isEmpty())
      <div class="ui placeholder segment">
        <div class="ui icon header">
          <i class="ghost icon"></i>Aún no hay elementos que mostrar.
        </div>
      </div>
    @endif
  </div>

  <livewire:store.create-terminal @show-message="$refresh"/>

  <div class="ui fitted basic segment">
    {{ $terminals->links('vendor.livewire.fomantic') }}
  </div>
</div>